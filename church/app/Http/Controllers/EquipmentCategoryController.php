<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EquipmentCategory;
use App\Models\EquipmentSubcategory;

class EquipmentCategoryController extends Controller
{
    public function index()
    {
        $categories =EquipmentCategory::with('subcategories')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit($id)
    {
        $category = EquipmentCategory::findOrFail($id);
        
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_code'=> 'required|string|max:2|unique:equipment_categories,category_code',
        ]);

        EquipmentCategory::create($request->only(['category_name', 'category_code']));

        return redirect()->route('admin.show_categories')->with('success', 'Category created successfully.');
    }

    public function update(Request $request, $id)
    {
        $category = EquipmentCategory::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_code' => 'required|string|max:2|unique:equipment_categories,category_code,' . $category->id,
        ]);

        $category->update($request->only(['category_name', 'category_code']));

        return redirect()->route('admin.show_categories')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = EquipmentCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.show_categories')->with('success', 'Category deleted successfully.');
    }

    public function createSubCategory($categoryId)
    {
        $category = EquipmentCategory::findOrFail($categoryId);
        return view('admin.categories.create_subcategory', compact('category'));
    }

    public function storeSubCategory(Request $request, $categoryId)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'subcategory_code' => 'required|string|max:2',
        ]);

        EquipmentSubCategory::create([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_code' => $request->subcategory_code,
            'category_id' => $categoryId,
        ]);

        return redirect()->route('admin.show_categories')->with('success', 'Subcategory created successfully.');
    }

    public function editSubCategory($id)
    {
        $subcategory = EquipmentSubCategory::findOrFail($id);
        return view('admin.categories.edit_subcategory', compact('subcategory'));
    }

    public function updateSubCategory(Request $request, $id)
    {
        $request->validate([
            'subcategory_name' => 'required|string|max:255',
            'subcategory_code' => 'required|string|max:2',
        ]);

        $subcategory = EquipmentSubCategory::findOrFail($id);
        $subcategory->update([
            'subcategory_name' => $request->subcategory_name,
            'subcategory_code' => $request->subcategory_code,
        ]);

        return redirect()->route('admin.show_categories')->with('success', 'Subcategory updated successfully.');
    }


    public function destroySubCategory($id)
    {
        $subcategory = EquipmentSubcategory::findOrFail($id);

        // Delete subcategory
        $subcategory->delete();

        return redirect()->route('admin.show_categories')->with('success', 'Subcategory deleted successfully.');
    }

}
