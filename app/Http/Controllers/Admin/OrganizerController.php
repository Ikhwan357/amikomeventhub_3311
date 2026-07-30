<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OrganizerController extends Controller
{
    /**
     * Daftar Organizer
     */
    public function index()
    {
        $organizations = Organization::with([
            'owner',
            'events'
        ])
            ->latest()
            ->paginate(10);

        return view(
            'admin.organizers.index',
            compact('organizations')
        );
    }

    /**
     * Form Tambah Organizer
     */
    public function create()
    {
        return view('admin.organizers.create');
    }

    /**
     * Simpan Organizer
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'organization_name' => 'required|max:255',

            'description' => 'nullable',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'owner_name' => 'required|max:255',

            'owner_email' => 'required|email|unique:users,email',

            'password' => 'required|min:8|confirmed',

        ]);

        DB::beginTransaction();

        try {

            $logo = null;

            if ($request->hasFile('logo')) {

                $logo = $request->file('logo')
                    ->store('organizations', 'public');

            }

            $organization = Organization::create([

                'name' => $data['organization_name'],

                'description' => $data['description'],

                'logo' => $logo,

            ]);

            $user = User::create([

                'name' => $data['owner_name'],

                'email' => $data['owner_email'],

                'password' => Hash::make($data['password']),

                'role' => 'organizer',

                'organization_id' => $organization->id,

            ]);

            $organization->update([

                'owner_id' => $user->id

            ]);

            DB::commit();

            return redirect()
                ->route('admin.organizers.index')
                ->with(
                    'success',
                    'Organizer berhasil dibuat.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }

    /**
     * Detail Organizer
     */
    public function show(Organization $organizer)
    {
        $ticketsSold = \App\Models\Transaction::whereHas('event', function ($query) use ($organizer) {
            $query->where('organization_id', $organizer->id);
        })
            ->where('status', 'paid')
            ->count();

        $totalRevenue = \App\Models\Transaction::whereHas('event', function ($query) use ($organizer) {
            $query->where('organization_id', $organizer->id);
        })
            ->where('status', 'paid')
            ->sum('total_price');

        return view('admin.organizers.show', compact(
            'organizer',
            'ticketsSold',
            'totalRevenue'
        ));
    }

    /**
     * Form Edit
     */
    public function edit(Organization $organizer)
    {
        $organizer->load('owner');

        return view(
            'admin.organizers.edit',
            compact('organizer')
        );
    }

    /**
     * Update Organizer
     */
    public function update(Request $request, Organization $organizer)
    {
        $data = $request->validate([

            'organization_name' => 'required|max:255',

            'description' => 'nullable',

            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            'owner_name' => 'required|max:255',

            'owner_email' => 'required|email|unique:users,email,' . $organizer->owner_id,

            'password' => 'nullable|min:8|confirmed',

        ]);

        DB::beginTransaction();

        try {

            if ($request->hasFile('logo')) {

                if ($organizer->logo) {

                    Storage::disk('public')
                        ->delete($organizer->logo);

                }

                $organizer->logo = $request
                    ->file('logo')
                    ->store('organizations', 'public');
            }

            $organizer->name = $data['organization_name'];

            $organizer->description = $data['description'];

            $organizer->save();

            $owner = $organizer->owner;

            $owner->name = $data['owner_name'];

            $owner->email = $data['owner_email'];

            if (!empty($data['password'])) {

                $owner->password = Hash::make($data['password']);

            }

            $owner->save();

            DB::commit();

            return redirect()
                ->route('admin.organizers.index')
                ->with(
                    'success',
                    'Organizer berhasil diperbarui.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()
                ->withInput()
                ->with(
                    'error',
                    $e->getMessage()
                );

        }
    }

    /**
     * Hapus Organizer
     */
    public function destroy(Organization $organizer)
    {
        DB::beginTransaction();

        try {

            if ($organizer->logo) {

                Storage::disk('public')
                    ->delete($organizer->logo);

            }

            if ($organizer->owner) {

                $organizer->owner->delete();

            }

            $organizer->delete();

            DB::commit();

            return redirect()
                ->route('admin.organizers.index')
                ->with(
                    'success',
                    'Organizer berhasil dihapus.'
                );

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with(
                'error',
                $e->getMessage()
            );

        }
    }
}