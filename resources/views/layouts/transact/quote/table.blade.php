<table id="6col-datatable" class="table table-vcenter table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th class="text-center">Company Name</th>
      <th class="text-center">Client's Representative</th>
      <th class="text-center">Representative Position</th>
      <th class="text-center">Address</th>
      <th class="text-center"></th>
      <th class="text-center">Controls</th>
    </tr>
  </thead>
  <tbody id="client-list">
    @foreach($clients as $key => $u)
    <tr>
        <td class="text-center">
            {{ $u->strClientName }}
        </td>
        <td class="text-center">
            {{ $u->strClientContactPerson }}
        </td>
        <td class="text-center">
            {{ $u->strClientPosition }}
        </td>
        <td class="text-center">
            {{ $u->strClientCity }},{{ $u->strClientProv }}
        </td>
        <td class="text-center">
          <label class="switch switch-primary">
            @if(($u->status)==1)
                  <p hidden>1</p>
              @else
                  <p hidden>0</p> 
              @endif
            <input name="status" id="status" type="checkbox" value="{{ $u->intClientID }}" 
              @if(($u->status)==1)
                  {{"checked"}}
              @else
                  {{""}} 
              @endif
              >
              <span></span></label>
        </td>
        <td>
          <div class="text-center">
            <button id="view_supp" class="btn btn-primary view_supp" value="{{$u->intEmpID}}"><span class="gi gi-eye_open">  </span>  View
            </button>
            <div id="view_modal" class="modal fade view_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="block full container-fluid">
                    <div class="block-title">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h3>Client Info</h3></div>
                    <div id="emps">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <button id="edit_supp" class="btn btn-warning edit_supp" value="{{$u->intClientID}}"> <span class="gi gi-edit"></span>  Edit
            </button>
            <button id="del_supp" class="btn btn-danger delete_supp" value="{{$u->intClientID}}"><span class="gi gi-delete"></span>  Delete
            </button>
          </div>
      </td>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="text-center">
<div id="edit_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="block full container-fluid">
              <div class="block-title">
              <button class="close" data-dismiss="modal">&times;</button>
              <h3>Edit Client</h3></div>

              {!! Form::open(['url'=>'client','method'=>'PUT','id'=>'frm-upd']) !!}
              <div class="row">
            <div class="col-lg-4">
              <label for="name">Client Name</label>
               {!! Form::text('name',null ,['id'=>'name','placeholder'=>'Client Name', 'class' => 'form-control', 'maxlength'=>'45', 'required'=>'required']) !!}
              <span id="duplicate" class="help-block animation-slideDown">
                Duplicate Client Name
              </span>
              <script>
                   $("#name").alphanum();
              </script>
            </div>
            <div class="col-lg-4">
              <label for="person">Client's Representative</label>
              {!! Form::text('person',null ,['id'=>'person','placeholder'=>'Name', 'class' => 'form-control', 'maxlength'=>'40', 'required'=>'required']) !!}
              <span id="duplicate2" class="help-block animation-slideDown">
                  Duplicate Representative Name
              </span>
              <script>
                     $("#person").alphanum();
              </script>
            </div>
            <div class="col-lg-4">
              <label for="position">Representative Position</label>
              {!! Form::text('position',null ,['id'=>'position','placeholder'=>'Position', 'class' => 'form-control', 'maxlength'=>'40', 'required'=>'required']) !!}
              <script>
                     $("#position").alphanum();
              </script>
            </div>
            <div class="col-lg-4">
              <label for="tin">Client TIN</label>
              {!! Form::text('tin',null ,['id'=>'tin','placeholder'=>'TIN Number', 'class' => 'form-control', 'maxlength'=>'20', 'required'=>'required']) !!}
              <script>
                $('#tin').numeric({
                    allowThouSep : false, 
                    allowDecSep : false,
                    allowMinus:   false
                });
              </script>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
               <label for="contact">Contact Number</label>
               {!! Form::text('contact',null ,['id'=>'contact','placeholder'=>'09197172839', 'class' => 'form-control', 'maxlength'=>'11', 'required'=>'required']) !!}
             
              <script>
                $('#contact').numeric({
                    allowThouSep : false, 
                    allowDecSep : false,
                    allowMinus:   false
                });
              </script>
            </div>
            <div class="col-lg-6">
              <label for="email">Email</label>
              {!! Form::email('email',null ,['id'=>'email','placeholder'=>'Email', 'class' => 'form-control', 'maxlength'=>'45', 'required'=>'required']) !!}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <label for="city">City</label>
              {!! Form::text('city',null ,['id'=>'city','placeholder'=>'City', 'class' => 'form-control', 'maxlength'=>'30', 'required'=>'required']) !!}
              <script>
              $('#city').alphanum();
              </script>
            </div>
            <div class="col-lg-6">
             <label for="prov">Province</label>
              {!! Form::text('prov',null ,['id'=>'prov','placeholder'=>'Province', 'class' => 'form-control', 'maxlength'=>'30', 'required'=>'required']) !!}
              
              <script>
                $('#prov').alphanum();
              </script>
            </div>
          </div>
               <hr>
              <div class="pull-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span> Save Changes</button>
              </div>
              <script>
                $('#strEquipTypeDesc').focus(function(){
                    $('span#duplicate').hide();
                   });
            </script>
            {!!Form::close()!!}
          </div>
        </div>
      </div>
    </div> 
  </div>
<div class="text-center">
    <div id="del_modal" class="modal fade del_modal" tabindex="-1" role="dialog" aria-labelledby="DeleteSupplierModal" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="block full container-fluid">
          <div class="block-title">
          <button class="close" data-dismiss="modal">&times;</button>
          <h3>Delete Client</h3></div>
           {!!Form::open(['url'=>'client','method'=>'PUT','id'=>'frm-del'])!!}
                <p><h4>Are you sure you want to delete</h4>
                </p>
                <p hidden><b id="deleteID"></b></p>
                <p>
                  <h3><b id="del_classname" ></b>??</h3>
                </p>
                <hr>
              <div class="pull-right">
                <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="gi gi-remove_2"></span> Cancel</button>
                <button type="submit" class="btn btn-primary" ><span class="gi gi-pen"></span>Delete</button>
            </div>
          {!!Form::close()!!}
        </div>
      </div>
    </div>
  </div> 
</div>
<script>$(function(){ TablesDatatables.init(); });</script>