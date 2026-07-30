<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;
use App\Models\Organization;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (beranda)
     */
    public function index(Request $request)
    {
        $partners = Partner::latest()->get();
        $categories = Category::latest()->get();

        $events = Event::with(['category', 'organization'])
            ->when($request->organizer, function ($query, $organizer) {
                return $query->where('organization_id', $organizer);
            })
            ->latest()
            ->take(3)
            ->get();

        // Hanya organizer yang sudah punya event yang ditampilkan di filter
        $organizers = Organization::whereHas('events')->get();

        return view('welcome', compact('partners', 'categories', 'events', 'organizers'));
    }

    /**
     * Menampilkan halaman profil praktikan
     */
    public function profil()
    {
        return view('profil');
    }

    /**
     * Menampilkan halaman katalog event
     */
    public function katalog(Request $request)
    {
        $events = Event::with(['category', 'organization'])
            ->when($request->search, function ($query, $search) {
                return $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('location', 'LIKE', '%' . $search . '%');
            })
            ->when($request->organizer, function ($query, $organizer) {
                return $query->where('organization_id', $organizer);
            })
            ->latest()
            ->get();

        $organizers = Organization::whereHas('events')->get();

        return view('katalog', compact('events', 'organizers'));
    }

    /**
     * Menampilkan halaman bantuan / FAQ
     */
    public function bantuan()
    {
        return view('bantuan');
    }

    /**
     * Menampilkan halaman kontak
     */
    public function kontak()
    {
        return view('contact');
    }
}