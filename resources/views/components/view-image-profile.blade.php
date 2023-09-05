<!-- Modal -->
<div class="modal fade" id="imageProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <img class="img-fluid" src="{{ ($usuario->u_img_profile == "") ? asset('images/3135768.png')  : asset($usuario->u_img_profile)}}" alt="">
        </div>
      </div>
    </div>
  </div>