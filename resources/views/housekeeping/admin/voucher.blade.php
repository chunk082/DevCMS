@extends('housekeeping.app')

@section('content')
    <h1>Vouchers</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createVoucherModal">Create Voucher</button>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Credits</th>
                <th>Points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->id }}</td>
                    <td>{{ $voucher->code }}</td>
                    <td>{{ $voucher->credits }}</td>
                    <td>{{ $voucher->points }}</td>
                    <td>
                        <form action="{{ route('housekeeping.admin.voucher.delete', $voucher) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Create Voucher Modal -->
    <div class="modal fade" id="createVoucherModal" tabindex="-1" aria-labelledby="createVoucherModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('housekeeping.admin.voucher.post') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createVoucherModalLabel">Create Voucher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="code" class="form-label">Code</label>
                            <div class="input-group">
                                <input type="text" id="code" name="code" class="form-control" readonly>
                                <button type="button" id="generateCode" class="btn btn-secondary">Generate</button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="credits" class="form-label">Credits</label>
                            <input type="number" id="credits" name="credits" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="points" class="form-label">Points</label>
                            <input type="number" id="points" name="points" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="points_type" class="form-label">Points Type</label>
                            <input type="text" id="points_type" name="points_type" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="catalog_item_id" class="form-label">Catalog Item ID</label>
                            <input type="number" id="catalog_item_id" name="catalog_item_id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" id="amount" name="amount" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="limit" class="form-label">Limit</label>
                            <input type="number" id="limit" name="limit" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Voucher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
    document.getElementById('generateCode').addEventListener('click', function () {
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        let result = '';
        for (let i = 0; i < 8; i++) {
            result += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        document.getElementById('code').value = result;
    });
</script>
@endsection
