<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Menu</h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ $action }}" method="post" id="form_action">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <label for="namaMenu" class="form-label">Nama Menu</label>
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" id="namaMenu"
                            placeholder="Nama Menu">
                    </div>
                    <div class="col-6">
                        <label for="icon" class="form-label">icon</label>
                        <input type="text" name="icon" value="{{ $data->icon }}" class="form-control" id="icon"
                            placeholder="icon">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="category" class="form-label">category</label>
                        <input type="text" name="category" value="{{ $data->category }}" class="form-control"
                            id="category" placeholder="category">
                    </div>
                    <div class="col-6">
                        <label for="url" class="form-label">url</label>
                        <input type="text" name="url" value="{{ $data->url }}" class="form-control" id="url"
                            placeholder="url">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <label for="ordery" class="form-label">orders</label>
                        <input type="text" name="orders" value="{{ $data->orders }}" class="form-control" id="ordery"
                            placeholder="ordery">
                    </div>
                    <div class="col-6">
                        <label for="level" class="form-label">Level Menu</label>
                        <div class="">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="level_menu" id="inlineRadio1"
                                    value="main_menu">
                                <label class="form-check-label" for="inlineRadio1">Main Menu</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="level_menu" id="inlineRadio2"
                                    value="sub_menu">
                                <label class="form-check-label" for="inlineRadio2">Sub menu</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="main_menu_wrapper" class="mb-3 d-none">
                    <label class="mt-4 form-label">Main Menu</label>
                    <select class="form-control choices-multiple-remove-button" name="main_menu"
                        id="choices-multiple-remove-button">
                        <option value="">Default</option>
                        @foreach ($mainMenus as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-gradient-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>