<div class="card">
    <div class="card-body bg-dark">
        <form wire:submit.prevent="withdraw">
            <div class="form-group text-white">
                <label for="">amount</label>
                <input type="number" step="0.01" min="0.01" class="form-control @error('amount')@enderror" wire.model='amount' value="{{old('amount')}}" required>
                @error('amount')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button class="btn btn-success mt-2" type="submit">withdraw</button>
        </form>
    </div>
</div>
