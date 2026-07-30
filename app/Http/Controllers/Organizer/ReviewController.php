<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Pastikan organizer sudah memiliki organisasi.
     */
    private function ensureOrganization()
    {
        if (Auth::user()->organization_id === null) {
            abort(403, 'Anda belum memiliki organisasi.');
        }
    }

    /**
     * Daftar Ulasan & Rating
     */
    public function index()
    {
        $this->ensureOrganization();

        $organizationId = Auth::user()->organization_id;

        $reviews = Review::with(['user', 'event'])
            ->where('organization_id', $organizationId)
            ->latest()
            ->paginate(10);

        $averageRating = Review::where('organization_id', $organizationId)->avg('rating');

        $totalReviews = Review::where('organization_id', $organizationId)->count();

        // Distribusi jumlah ulasan per bintang (5 -> 1), untuk progress bar
        $ratingCounts = Review::where('organization_id', $organizationId)
            ->selectRaw('rating, count(*) as total')
            ->groupBy('rating')
            ->pluck('total', 'rating');

        $ratingBreakdown = collect(range(5, 1))->mapWithKeys(function ($star) use ($ratingCounts, $totalReviews) {
            $count = $ratingCounts->get($star, 0);
            $percentage = $totalReviews > 0 ? round(($count / $totalReviews) * 100) : 0;

            return [$star => ['count' => $count, 'percentage' => $percentage]];
        });

        return view('organizer.reviews.index', compact(
            'reviews',
            'averageRating',
            'totalReviews',
            'ratingBreakdown'
        ));
    }
}