<?php

namespace App\Http\Controllers\Stone;

use App\Http\Controllers\Controller;
use App\Models\StoneShowroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class ShowroomController extends Controller
{
    /**
     * Helper function to get image URL
     */
    private function getImageUrl($path = null, $default = 'images/default/default_image.png')
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return asset('storage/' . $path);
        }
        
        return asset($default);
    }
    /**
     * Hiển thị danh sách showroom
     */
    public function index()
    {
        $showrooms = StoneShowroom::where('status', 1)
            ->orderBy('order', 'asc')
            ->paginate(12);
            
        return response()->view('stone.showrooms.index', compact('showrooms'));
    }
    
    /**
     * Hiển thị chi tiết showroom
     */
    public function show($slug)
    {
        $showroom = StoneShowroom::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();
            
        // Lấy các showroom khác
        $otherShowrooms = StoneShowroom::where('status', 1)
            ->where('id', '!=', $showroom->id)
            ->orderBy('order', 'asc')
            ->get();
            
        return view('stone.showrooms.show', compact('showroom', 'otherShowrooms'));
    }
} 