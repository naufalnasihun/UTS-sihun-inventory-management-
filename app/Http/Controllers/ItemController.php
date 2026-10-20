<?php
 
namespace App\Http\Controllers;
 
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
 
class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::with('category')->latest();
 
        if ($request->filled('q')) {
            $q = $request->string('q')->toString();
            $query->where('name', 'like', "%{$q}%");
        }
 
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->integer('category_id'));
        }
 
        $items = $query->paginate(10)->withQueryString();
        $categories = Category::orderBy('name')->get();
 
        return view('items.index', compact('items', 'categories'));
    }
 
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('items.create', [
            'item' => new Item(),
            'categories' => $categories,
        ]);
    }
 
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);
 
        Item::create($data);
 
        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil ditambahkan.');
    }
 
    public function edit(Item $item)
    {
        $categories = Category::orderBy('name')->get();
        return view('items.edit', compact('item', 'categories'));
    }
 
    public function update(Request $request, Item $item)
    {
        $data = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ]);
 
        $item->update($data);
 
        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil diperbarui.');
    }
 
    public function destroy(Item $item)
    {
        $item->delete();
 
        return redirect()->route('items.index')
            ->with('success', 'Barang berhasil dihapus.');
    }
}
