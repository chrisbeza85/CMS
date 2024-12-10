<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Church Manager - Add Item" />
    <link rel="stylesheet" href="{{ asset('css/addmember.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}" type="text/css">
    <title>Add Item</title>
    <style>
        /* Gradient background */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, rgba(173, 216, 230, 0.3), rgba(255, 99, 71, 0.3), rgba(255, 255, 255, 0.5));
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }

        .form-container {
            max-width: 700px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

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
        <h2 class="form-title">Add Inventory</h2>

        <form action="{{ route('owned_items.store') }}" method="POST" autocomplete="on">
            @csrf

            <div class="input-row">
                <!-- Item Name -->
                <div class="input-group">
                    <input id="item_name" name="item_name" type="text" class="input" required autofocus autocomplete="item_name" />
                    <label for="item_name" class="placeholder">Item Name</label>
                </div>

                <!-- Serial Number -->
                <div class="input-group">
                    <input id="actual_serial_no" name="actual_serial_no" type="text" class="input" />
                    <label for="actual_serial_no" class="placeholder">Serial Number</label>
                </div>

                <!-- Quantity -->
                <div class="input-group">
                    <input id="quantity" name="quantity" type="number" class="input" required autofocus autocomplete="quantity" />
                    <label for="quantity" class="placeholder">Quantity</label>
                </div>

                <!-- Status -->
                <div class="input-group">
                    <select name="status" class="input" id="status" required autocomplete="status">
                        <option value="" disabled selected></option>
                        <option value="stored">Stored</option>
                        <option value="lost">Lost</option>
                        <option value="damaged">Damaged</option>
                        <option value="outbound">Outbound</option>
                        <option value="inbound">Inbound</option>
                        <option value="donated">Donated</option>
                        <option value="received">Received</option>
                    </select>
                    <label for="status" class="placeholder">Status</label>
                </div>

                <!-- Description -->
                <div class="input-group">
                    <textarea name="description" class="input" id="description"></textarea>
                    <label for="description" class="placeholder">Description</label>
                </div>

                <!-- Item Value -->
                <div class="input-group">
                    <input id="item_value" name="item_value" type="number" step="0.01" class="input" />
                    <label for="item_value" class="placeholder">Item Value</label>
                </div>

                <!-- Item Condition -->
                <div class="input-group">
                    <select name="item_condition" class="input" id="item_condition">
                        <option value=""></option>
                        <option value="new">New</option>
                        <option value="used">Used</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                        <option value="poor">Poor</option>
                    </select>
                    <label for="item_condition" class="placeholder">Item Condition</label>
                </div>

                <!-- Location -->
                <div class="input-group">
                    <input id="location" name="location" type="text" class="input" />
                    <label for="location" class="placeholder">Location</label>
                </div>

                <!-- Supplier -->
                <div class="input-group">
                    <select name="supplier_id" class="input" id="supplier_id">
                        <option value=""></option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                    <label for="supplier_id" class="placeholder">Supplier</label>
                </div>

                <!-- Customer -->
                <div class="input-group">
                    <select name="customer_id" class="input" id="customer_id">
                        <option value=""></option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <label for="customer_id" class="placeholder">Customer</label>
                </div>

                <!-- Donor -->
                <div class="input-group">
                    <select name="donor_id" class="input" id="donor_id">
                        <option value=""></option>
                        @foreach ($donors as $donor)
                            <option value="{{ $donor->id }}">{{ $donor->name }}</option>
                        @endforeach
                    </select>
                    <label for="donor_id" class="placeholder">Donor</label>
                </div>

                <!-- Donated To -->
                <div class="input-group">
                    <select name="donated_to_id" class="input" id="donated_to_id">
                        <option value=""></option>
                        @foreach ($donatedTos as $donatedTo)
                            <option value="{{ $donatedTo->id }}">{{ $donatedTo->name }}</option>
                        @endforeach
                    </select>
                    <label for="donated_to_id" class="placeholder">Donated To</label>
                </div>

                <!-- Department -->
                <div class="input-group">
                    <select name="dept_code" class="input" id="dept_code" required>
                        <option value=""></option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->dept_code }}">{{ $department->dept_name }}</option>
                        @endforeach
                    </select>
                    <label for="dept_code" class="placeholder">Department</label>
                </div>

                <!-- Category -->
                <div class="input-group">
                    <select name="category_id" class="input" id="category_id" required>
                        <option value=""></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="category_id" class="placeholder">Category</label>
                </div>

                <!-- Subcategory -->
                <div class="input-group">
                    <select name="subcategory_id" class="input" id="subcategory_id" required>
                        <option value=""></option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                        @endforeach
                    </select>
                    <label for="subcategory_id" class="placeholder">Subcategory</label>
                </div>

                <!-- Year Bought -->
                <div class="input-group">
                    <input id="year_bought" name="year_bought" type="number" class="input" required />
                    <label for="year_bought" class="placeholder">Year Bought</label>
                </div>
            </div>

            <!-- Buttons -->
            <div class="button-container">
                <button type="submit" class="submitbtn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add Item</button>
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

    <script src="/images/script.js
