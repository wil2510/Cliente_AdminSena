<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Training_center;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::with('trainingCenter')
            ->orderBy('publish_date', 'desc')
            ->get();

        return view('noticia.index', compact('noticias'));
    }

    public function create()
    {
        $trainingCenters = Training_center::all();

        return view('noticia.create', compact('trainingCenters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'publish_date' => 'required|date',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('noticias', 'public');
        }

        Noticia::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'publish_date' => $request->publish_date,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('noticia.index')
            ->with('success', 'Noticia creada correctamente.');
    }

    public function show($id)
    {
        $noticia = Noticia::with('trainingCenter')
            ->findOrFail($id);

        return view('noticia.show', compact('noticia'));
    }

    public function edit($id)
    {
        $noticia = Noticia::findOrFail($id);
        $trainingCenters = Training_center::all();

        return view('noticia.edit', compact(
            'noticia',
            'trainingCenters'
        ));
    }

    public function update(Request $request, $id)
    {
        $noticia = Noticia::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'publish_date' => 'required|date',
            'training_center_id' => 'required|exists:training_centers,id',
        ]);

        $imagePath = $noticia->image;

        if ($request->hasFile('image')) {

            if ($noticia->image) {
                Storage::disk('public')->delete($noticia->image);
            }

            $imagePath = $request->file('image')
                ->store('noticias', 'public');
        }

        $noticia->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'publish_date' => $request->publish_date,
            'training_center_id' => $request->training_center_id,
        ]);

        return redirect()
            ->route('noticia.index')
            ->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        if ($noticia->image) {
            Storage::disk('public')->delete($noticia->image);
        }

        $noticia->delete();

        return redirect()
            ->route('noticia.index')
            ->with('success', 'Noticia eliminada correctamente.');
    }
}