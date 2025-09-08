  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body">
                  <h4>Add more {{ $type }}</h4>

                  <form method="POST" wire:submit.prevent="addFiles" enctype="multipart/form-data">
                      @csrf
                      <label class="form-label">Select {{$type}}</label>
                      <div class="input-group input-group-outline">
                          <input type="file" class="form-control" multiple wire:model="files" required>
                      </div>

                      <div class="d-flex justify-content-end mt-5">
                          <button type="submit"
                              class="btn btn-primary">Add {{$type}}</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>