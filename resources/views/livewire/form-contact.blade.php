<form wire:submit.prevent="send" class="row g-1">
    @csrf
    <div class="col-12">
        <input type="text" placeholder="{{ __('Nome') }}*" class="form-control" wire:model.defer="name" required>
    </div>
    <div class="col-lg-12">
        <input type="email" placeholder="{{ __('Email') }}*" class="form-control" wire:model.defer="email" required>
    </div>
    <div class="col-lg-12">
        <input type="text" placeholder="{{ __('Telefone') }}*" class="form-control mask-telefone" wire:model.defer="phone" required>
    </div>
    <div class="col-12 d-flex justify-content-center justify-content-lg-start mt-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" wire:model.defer="accept" id="termosCheck" required>
            <label class="form-check-label text-white" for="termosCheck">
                <x-accept-text />
            </label>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center justify-content-lg-start mt-2">
        <button type="submit" class="btn btn-danger rounded-0 fs-20 text-white">
            <span wire:loading.remove>
                {{ __('Enviar formulário') }}
            </span>
            <span wire:loading.inline>
                {{ __('Aguarde') }}...
            </span>
        </button>
        <x-flash-messages />
    </div>
</form>
