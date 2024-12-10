@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Inventory Dashboard</h2>
    
    <!-- Widgets Section -->
    <div class="row">
        <!-- Today's Updates -->
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Today's Updates</h5>
                    <p class="card-text">{{ $todayUpdates }} updates today</p>
                </div>
            </div>
        </div>

        <!-- Last 5 Updates -->
        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Last 5 Updates</h5>
                    <ul class="list-unstyled">
                        @foreach ($recentUpdates as $update)
                            <li>{{ $update->name }} - {{ $update->created_at->format('d M Y H:i') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Total Items -->
        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Items</h5>
                    <p class="card-text">{{ $totalItems }} items in inventory</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <!-- Poor Condition Items -->
        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Items in Poor Condition</h5>
                    <p class="card-text">{{ $poorConditionCount }} items</p>
                </div>
            </div>
        </div>
        <!-- Lost Items -->
        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Lost Items</h5>
                    <p class="card-text">{{ $lostItemsCount }} items</p>
                </div>
            </div>
        </div>

        <!-- Damaged Items -->
        <div class="col-md-4">
            <div class="card text-white bg-dark">
                <div class="card-body">
                    <h5 class="card-title">Damaged Items</h5>
                    <p class="card-text">{{ $damagedItemsCount }} items</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Bar Graph -->
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Item Conditions Overview</h5>
                    <canvas id="conditionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('conditionChart').getContext('2d');
    const conditionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Poor Condition', 'Lost Items', 'Damaged Items'],
            datasets: [{
                label: '# of Items', 
                data: [{{ $barGraphData['poor'] }}, {{ $barGraphData['lost'] }}, {{ $barGraphData['damaged'] }}],
                backgroundColor: ['#FFC107', '#DC3545', '#343A40'],
                borderColor: ['#FFC107', '#DC3545', '#343A40'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
