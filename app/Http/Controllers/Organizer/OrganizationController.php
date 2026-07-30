<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    /**
     * Form edit organisasi
     */
    public function edit()
    {
        $organization = Organization::findOrFail(
            Auth::user()->organization_id
        );

        return view(
            'organizer.organization.edit',
            compact('organization')
        );
    }

    /**
     * Update organisasi
     */
    public function update(Request $request)
    {
        $organization = Organization::findOrFail(
            Auth::user()->organization_id
        );

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('logo')) {

            if ($organization->logo) {
                Storage::disk('public')->delete($organization->logo);
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('organizations', 'public');
        }

        $organization->update($data);

        return redirect()
            ->route('organizer.organization.edit')
            ->with('success', 'Profil organisasi berhasil diperbarui.');
    }
}