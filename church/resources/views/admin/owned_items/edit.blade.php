<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Edit Item" />
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Edit Item</title>
    <style>
        /* Center form container */
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        /* Center the button container */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        /* Button styles */
        .submitbtn {
            text-decoration: none;
            margin: 5px;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <div class="logo">
            <img src="/images/sda.png" class="sda_logo">
        </div>
        <h2 class="form-title">Edit Item</h2>

        <form action="{{ route('owned_items.update', $ownedItem->id) }}" method="POST" autocomplete="on">
            @csrf
            @method('PUT')

            <!-- Input rows for the form -->
            <div class="input-row">
                <div class="input-group">
                    <input id="item_name" name="item_name" type="text" class="input" value="{{ $ownedItem->item_name }}" readonly />
                    <label for="item_name" class="placeholder">Item Name</label>
                </div>

                <div class="input-group">
                    <input id="actual_serial_no" name="actual_serial_no" type="text" class="input" value="{{ $ownedItem->actual_serial_no }}" />
                    <label for="actual_serial_no" class="placeholder">Serial Number</label>
                </div>

                <div class="input-group">
                    <input id="quantity" name="quantity" type="number" class="input" value="{{ $ownedItem->quantity }}" />
                    <label for="quantity" class="placeholder">Quantity</label>
                </div>

                <div class="input-group">
                    <textarea id="description" name="description" class="input">{{ $ownedItem->description }}</textarea>
                    <label for="description" class="placeholder">Description</label>
                </div>

                <div class="input-group">
                    <input id="item_value" name="item_value" type="number" step="0.01" class="input" value="{{ $ownedItem->item_value }}" />
                    <label for="item_value" class="placeholder">Item Value</label>
                </div>

                <div class="input-group">
                    <input id="location" name="location" type="text" class="input" value="{{ $ownedItem->location }}" />
                    <label for="location" class="placeholder">Location</label>
                </div>

                <!-- Dropdown fields -->
                <div class="input-group">
                    <select id="status" name="status" class="input">
                        <option value="stored" {{ $ownedItem->status === 'stored' ? 'selected' : '' }}>Stored</option>
                        <option value="lost" {{ $ownedItem->status === 'lost' ? 'selected' : '' }}>Lost</option>
                        <option value="damaged" {{ $ownedItem->status === 'damaged' ? 'selected' : '' }}>Damaged</option>
                        <option value="outbound" {{ $ownedItem->status === 'outbound' ? 'selected' : '' }}>Outbound</option>
                        <option value="inbound" {{ $ownedItem->status === 'inbound' ? 'selected' : '' }}>Inbound</option>
                        <option value="donated" {{ $ownedItem->status === 'donated' ? 'selected' : '' }}>Donated</option>
                        <option value="received" {{ $ownedItem->status === 'received' ? 'selected' : '' }}>Received</option>
                    </select>
                    <label for="status" class="placeholder">Status</label>
                </div>
                <div class="input-group">
                    <select id="item_condition" name="item_condition" class="input">
                        <option value="new" {{ $ownedItem->item_condition == 'new' ? 'selected' : '' }}>New</option>
                        <option value="used" {{ $ownedItem->item_condition == 'used' ? 'selected' : '' }}>Used</option>
                        <option value="good" {{ $ownedItem->item_condition == 'good' ? 'selected' : '' }}>Good</option>
                        <option value="fair" {{ $ownedItem->item_condition == 'fair' ? 'selected' : '' }}>Fair</option>
                        <option value="poor" {{ $ownedItem->item_condition == 'poor' ? 'selected' : '' }}>Poor</option>
                    </select>
                    <label for="item_condition" class="placeholder">Item Condition</label>
                </div>

                <!-- Supplier and related fields -->
                <div class="input-group">
                    <select id="supplier_id" name="supplier_id" class="input">
                        <option value=""></option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" {{ $ownedItem->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <label for="supplier_id" class="placeholder">Supplier</label>
                </div>

                <div class="input-group">
                    <select id="customer_id" name="customer_id" class="input">
                        <option value=""></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $ownedItem->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <label for="customer_id" class="placeholder">Customer</label>
                </div>

                <div class="input-group">
                    <select id="donor_id" name="donor_id" class="input">
                        <option value=""></option>
                        @foreach ($donors as $donor)
                            <option value="{{ $donor->id }}" {{ $ownedItem->donor_id == $donor->id ? 'selected' : '' }}>{{ $donor->name }}</option>
                        @endforeach
                    </select>
                    <label for="donor_id" class="placeholder">Donor</label>
                </div>

                <div class="input-group">
                    <select id="donated_to_id" name="donated_to_id" class="input">
                        <option value=""></option>
                        @foreach ($donatedTos as $donatedTo)
                            <option value="{{ $donatedTo->id }}" {{ $ownedItem->donated_to_id == $donatedTo->id ? 'selected' : '' }}>{{ $donatedTo->name }}</option>
                        @endforeach
                    </select>
                    <label for="donated__to_id" class="placeholder">Recipient</label>
                </div>

                <!-- New Fields -->
                <div class="input-group">
                    <select name="dept_code" class="input" id="dept_code" required>
                        <option value=""></option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->dept_code }}" {{ $ownedItem->dept_code == $department->dept_code ? 'selected' : '' }}>{{ $department->dept_name }}</option>
                        @endforeach
                    </select>
                    <label for="dept_code" class="placeholder">Department</label>
                </div>

                <div class="input-group">
                    <select name="category_id" class="input" id="category_id" required>
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $ownedItem->category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="category_id" class="placeholder">Equipment Category</label>
                </div>

                <div class="input-group">
                    <select name="subcategory_id" class="input" id="subcategory_id" required>
                        <option value=""></option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $ownedItem->subcategory_id == $subcategory->id ? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                        @endforeach
                    </select>
                    <label for="subcategory_id" class="placeholder">Equipment Subcategory</label>
                </div>

                <div class="input-group">
                    <input id="year_bought" name="year_bought" type="number" class="input" value="{{ $ownedItem->year_bought }}" />
                    <label for="year_bought" class="placeholder">Year Bought</label>
                </div>
            </div>

            <!-- Center the buttons in a container -->
            <div class="button-container">
                <button type="submit" class="submitbtn btn-primary"><i class="fa fa-save"></i>&nbsp;&nbsp;Update</button>
                <a href="{{ route('admin.show_inventory') }}" class="submitbtn btn-secondary"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</a>
            </div>
        </form>
    </div>

    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted1 d-block text-center text-sm-left d-sm-inline-block">
                &copy; University SDA Church 2024
            </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                Computer Science Dept - <a href="https://www.unza.zm" target="_blank">University Of Zambia</a>
            </span>
        </div>
    </footer>

    <script src="/images/script.js"></script>
</body>

</html>
