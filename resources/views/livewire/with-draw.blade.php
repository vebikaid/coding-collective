<div class="card">
    <div class="card-body bg-dark">
        <form wire:submit.prevent="withdraw">
            <div class="form-group text-white">
                @if(session()->has('flash'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('flash')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <label for="">amount</label>
                <input type="number" step="0.01" min="0.01" class="form-control @error('amount') is-invalid @enderror" wire:model="amount" value="{{old('amount')}}" required>
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
