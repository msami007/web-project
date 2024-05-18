<div>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Press Space to Generate color palette</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="#">Features</a>
    </nav>
    <a class="btn gen-btn hover " href="#"><i class="fa fa-eye mr-2"></i>View</a>
    <a class="btn gen-btn hover" id="savePaletteBtn" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="far fa-heart mr-2"></i>Save</a>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Palette Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('palatte.page')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" placeholder="Enter palette name" aria-describedby="helpId">
          </div>
          <input type="hidden" name="hex1" id="color1">
          <input type="hidden" name="hex2" id="color2">
          <input type="hidden" name="hex3" id="color3">
          <input type="hidden" name="hex4" id="color4">
          <input type="hidden" name="hex5" id="color5">
          <div id="colorDisplay" class="mt-3" style="width: 100%; height: 50px;"></div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
  </div>
</div>