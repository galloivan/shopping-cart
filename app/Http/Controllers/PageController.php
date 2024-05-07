<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Item;

class PageController extends Controller
{

  
    //Insert Category
    public function setCategory(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
        ]);
        $category = Category::create([
            'name' => $fields['name'],
            'description' => $fields['description']
        ]);
    
        return response($category, 201);
    }
    //Get Category
    public function getCategories(){
        $arryCategories = Category::all();
        return response($arryCategories, 201);
    }

    //insert Item
   
    public function setItem(Request $request)
    {
        // Validate the incoming request data
        $fields = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|between:0,99999.99',
            'category_id' => 'required|integer',
            'image' => 'nullable|string'  // Assuming you are accepting a URL
        ]);
    
        // Create the item with validated fields
        $item = Item::create([
            'name' => $fields['name'],
            'description' => $fields['description'],
            'price' => $fields['price'],
            'category_id' => $fields['category_id'],
            'image' => $fields['image']  // Store the URL directly
        ]);
    
        // Return the created item with a 201 Created status
        return response()->json($item, 201);
    }
    
    // get Item
    
    public function getItems(){
        $arryItems = Item::all();
        return response($arryItems, 201);
    }
    //get  Item by name, description 
    
    public function getItem($search){
        $arryItems = Item::where('name', 'LIKE', '%'.$search.'%')
                         ->orWhere('description', 'LIKE', '%'.$search.'%')
                         ->get();
        return response($arryItems, 201);
    }
    // get item  by category
    public function getItemsByCategory($search){
        $categories = Category::where('name', 'LIKE', '%'.$search.'%')->get();
        $items = [];
        if (sizeof($categories) > 0) {
            $idCat = $categories[0]->id;
            $items = Category::find($idCat)->items;
        }
    
        foreach ($items as $item) {
            // Additional processing can be done here
        }
        return response($items, 201);
    }
    // get category by item

    public function getCategoryByItem($search){
        $items = Item::where('name', 'LIKE', '%' . $search . '%')
                     ->orWhere('description', 'LIKE', '%' . $search . '%')
                     ->get();
    
        if (isset($items) && sizeof($items) > 0) {
            $idItem = $items[0]->id;
            $category = Item::find($idItem)->category;
            return response([$category], 201);
        }
        
        return response([], 201);
    }

    public function deleteCategory($categoryName){
        $category = Category::where('name', $categoryName)->first();
        if ($category) {
            $category->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }

    // Delete Item by Name
    public function deleteItem($itemName){
        $item = Item::where('name', $itemName)->first();
        if ($item) {
            $item->delete();
            return response()->json(['message' => 'Item deleted successfully'], 200);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }

    // Update Category by Name
    public function updateCategory(Request $request, $categoryName){
        $category = Category::where('name', $categoryName)->first();
        if ($category) {
            $category->update($request->all());
            return response()->json(['message' => 'Category updated successfully', 'category' => $category], 200);
        }
        return response()->json(['message' => 'Category not found'], 404);
    }

    // Update Item by Name
    public function updateItem(Request $request, $itemName){
        $item = Item::where('name', $itemName)->first();
        if ($item) {
            $item->update($request->all());
            return response()->json(['message' => 'Item updated successfully', 'item' => $item], 200);
        }
        return response()->json(['message' => 'Item not found'], 404);
    }
    
    
}
