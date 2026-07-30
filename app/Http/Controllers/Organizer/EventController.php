<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
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
     * Pastikan event milik organisasi yang sedang login.
     */
    private function authorizeEvent(Event $event)
    {
        $this->ensureOrganization();

        abort_if(
            $event->organization_id != Auth::user()->organization_id,
            403,
            'Anda tidak memiliki akses ke event ini.'
        );
    }

    /**
     * Daftar Event
     */
    public function index()
    {
        $this->ensureOrganization();

        $events = Event::with('category')
            ->where('organization_id', Auth::user()->organization_id)
            ->latest()
            ->paginate(10);

        return view('organizer.events.index', compact('events'));
    }

    /**
     * Form Tambah Event
     */
    public function create()
    {
        $this->ensureOrganization();

        $categories = Category::all();

        return view('organizer.events.create', compact('categories'));
    }

    /**
     * Simpan Event
     */
    public function store(Request $request)
    {
        $this->ensureOrganization();

        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('poster')) {
            $data['poster_path'] = $request->file('poster')
                ->store('posters', 'public');
        }

        // Multi Tenant
        $data['organization_id'] = Auth::user()->organization_id;

        Event::create($data);

        return redirect()
            ->route('organizer.events.index')
            ->with('success', 'Event berhasil ditambahkan.');
    }

    /**
     * Detail Event
     */
    public function show(Event $event)
    {
        $this->authorizeEvent($event);

        return view('organizer.events.show', compact('event'));
    }

    /**
     * Form Edit
     */
    public function edit(Event $event)
    {
        $this->authorizeEvent($event);

        $categories = Category::all();

        return view('organizer.events.edit', compact(
            'event',
            'categories'
        ));
    }

    /**
     * Update Event
     */
    public function update(Request $request, Event $event)
    {
        $this->authorizeEvent($event);

        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:1',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('poster')) {

            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }

            $data['poster_path'] = $request->file('poster')
                ->store('posters', 'public');
        }

        $event->update($data);

        return redirect()
            ->route('organizer.events.index')
            ->with('success', 'Event berhasil diperbarui.');
    }

    /**
     * Hapus Event
     */
    public function destroy(Event $event)
    {
        $this->authorizeEvent($event);

        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }

        $event->delete();

        return redirect()
            ->route('organizer.events.index')
            ->with('success', 'Event berhasil dihapus.');
    }
}