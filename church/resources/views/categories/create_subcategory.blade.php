<form action="{{ route('categories.store_subcategory', $category->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="subcategory_name">Subcategory Name</label>
        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="sub_category_code">Subcategory Code (2 digits)</label>
        <input type="text" name="subcategory_code" id="subcategory_code" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Create Subcategory</button>
</form>
