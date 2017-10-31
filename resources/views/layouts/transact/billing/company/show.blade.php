@extends('layouts.transact.main')
@section('head')
<script >
    $(function(){ FormsValidation.init(); });
     $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    var getId = $('#invoice').val();
    // alert(getId);  


     function readByAjax()
        {
    $.get( getId +'/edit', function (data) {
              if(data.progress1)
              {
                $('#prog').html("<h4 >"+data.progress1+" % Downpayment </h4>");
               $('#amt').html("<h4 > ₱ "+data.amount1+"</h4>");
               $('#mode').val("Downpayment");
               $('#mode2').val("Downpayment");
               $('#amount').val(data.amount1);
               $('#thisamount').val(data.amount1);
               $('#getstatus').val(data.status);
               $('#collectmode').val("Downpayment");
               $('#getID').val(data.id);
               $('#getID2').val(data.id);
               if(data.status==2)
               {
                  $('#btnbill').html("Collect Payment").attr('id','btncollect');
                  $('#date').val(data.datDueDate);
                  $('#getstatus2').val(data.status);
                  Timer();


               }
               else if(data.status==0)
               {
                  $('#btnbill').html("Bill Client");
               }
              }
              else
              {
               
                   if(data.progress==null )
                   {
                       $('#prog').html("<h4 ><span class='fa fa-check text-success'> Completed</span ></h4>");
                       $('#amt').html("<h4 ><span class='fa fa-check text-success'> Completed</span ></h4>");
                      $('#btnbill').html("<span class='fa fa-mortar-board'> </span> Turnover").attr('id','btnturnover');
                       if (data.overall<data.progress)
                           {
                              $('#btnturnover').attr('disabled',true);
                           }
                           else if(data.overall=data.progress)
                           {
                              $('#btnturnover').attr('disabled',false);

                           }

                   }
             else
                   {
                        $('#prog').html("<h4 >"+data.progress+" % Progress Billing </h4>");
                       $('#amt').html("<h4 > ₱ "+data.amount+"</h4>");
                       $('#mode').val("Progress Billing");
                       $('#mode2').val("Progress Billing");
                       $('#amount').val(data.amount);
                       $('#thisamount').val(data.amount);
                       $('#getstatus').val(data.status);
                       $('#getstatus2').val(data.status);

                       $('#collectmode').val("Progress Billing");
                       $('#getID').val(data.intPBID);
                       $('#getID2').val(data.intPBID);
                       if(data.status==2)
                       {
                          $('#btnbill').html("Collect Payment").attr('id','btncollect');
                          $('#date').val(data.datDueDate);
                          $('#getstatus2').val(data.status);
                          Timer();


                       }
                       else if(data.status==0)
                       {
                          $('#btnbill').html("Bill Client");
                          $('#here').html('<a href="/progressmonitoring/{{$showDown->strContractID}}" type="button" class="btn btn-lg btn-alt btn-info" id="btnred" >Manage Project<span class="fa fa-angle-double-right"></span></a>');
                          if (data.overall<data.progress)
                           {
                              $('#btnbill').attr('disabled',true);
                           }
                           else if(data.overall>=data.progress)
                           {
                              $('#btnbill').attr('disabled',false);

                           }
                       }
                   }
                }
                
              
          })
      
  };
  readByAjax();

  $(this).on('click','#btnbill', function(){
          $('#confirm_modal').modal('show');
            });
  $(this).on('click','#btncollect', function(){
            window.location = 'collect/'+getId;
            });
  $(this).on('click','#btnturnover', function(){
          $.get( getId +'/turnover', function (data) {
           a='';
           for (a=0; a<data.length; a++) {
                  $('#contId').text(data[a].strContractID);
                  $('#cont').val(data[a].strContractID);
                $('#quoteName').text(data[a].strQuoteName);
                $('#client').text(data[a].strCompClientName);
                $('#datStart').text(data[a].datProjStart);
                $('#datEnd').text(data[a].datProjEnd);
           }
            })
          $('#turnover_modal').modal('show');
        });

     
     });

  </script>
@endsection
@section('sidebar')
  <!-- Main Sidebar -->
  <div id="sidebar">
      <!-- Wrapper for scrolling functionality -->
      <div class="sidebar-scroll">
          <!-- Sidebar Content -->
          <div class="sidebar-content">
              <!-- Icon for user -->
              @include('layouts.headers.usericon')
              <!-- Sidebar Navigation -->
              @include('layouts.dashboard.sidebar')
              <!-- @include('layouts.transact.billing.company.sidebar') -->
              <!-- END Sidebar Navigation -->
          </div>
          <!-- END Sidebar Content -->
      </div>
      <!-- END Wrapper for scrolling functionality -->
  </div>
  <!-- END Main Sidebar -->
@endsection

@section('content')
  <div class="content-header">
    <div class="header-section">
      <h4>
          <i class="fa fa-wrench"> </i> Contract Transaction<br>
      </h4>
    </div>
  </div>
    <ol class="breadcrumb breadcrumb-top">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i></a></li>
        <li><a href="javascript:void(0)">Transaction</a></li>
        <li><a href="javascript:void(0)">Billing & Collection</a></li>
        <li><a href="javascript:void(0)">Billing</a></li>

    </ol>
       
      <!-- Simple Profile Widgets Row -->
      
      <div class="block block-full">
      <div class="block-title themed-background">
        <h3 class="themed-background" style="color:white"><strong>Billing</strong></h3>
        </div> 
          <br>
            <fieldset>
                 <div class=" col-md-12">
                    <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                            <th class="text-center"></th>
                            <th class="text-center">Mode</th>
                            <th class="text-center">Invoice Amount</th>
                            <th class="text-center">Recoupment</th>
                            <th class="text-center">Retention</th>
                            <th class="text-center">Subtotal</th>
                            <th class="text-center">Vatable Amount</th>
                            <th class="text-center">Tax</th>
                            <th class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td class="text-center">
                           <h5>{{$showDown->intDownValue}}%</h5>
                         </td>
                         <td class="text-center">
                           <h5>Downpayment</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$showDown->dcmDPAmount}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>--</h5>
                         </td>
                         <td class="text-center">
                           <h5>--</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$showDown->dcmDPAmount}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$showDown->initialtax}} </h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$showDown->taxValue}} </h5>
                         </td>
                         <td class="text-center">
                           @if(($showDown->downstatus)==0)
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            @elseif(($showDown->downstatus)==1)
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            @elseif(($showDown->downstatus)==2)
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          @endif
                         </td>
                      </tr>
                       <tr>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                          <td class="text-center"></td>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                        <td class="text-center"></td>
                       </tr>
                       @foreach($table as $t)
                       <tr>
                         <td class="text-center">
                           <h5>{{$t->intPBValue}}%</h5>
                         </td>
                         <td class="text-center">
                           <h5>Progress Billing</h5>
                         </td>
                         <td class="text-center">
                           <h5 >₱ {{$t->initial}}</h5>
                         </td>
                          <td class="text-center">
                           <h5 id="trec">₱ {{$t->recValue}} </h5>
                         </td>
                         <td class="text-center">
                           <h5 id="tret">₱ {{$t->retValue}}</h5>
                         </td>
                         <td class="text-center">
                           <h5 id="sub">₱ {{$t->dblPBAmount}} </h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$t->initialtax}}</h5>
                         </td>
                         <td class="text-center">
                           <h5>₱ {{$t->taxValue}}</h5>
                         </td>
                        <td class="text-center">
                           @if(($t->pbstatus)==0)
                           <h5 style="color: #D64F40;font-weight: bold;"> Unpaid</h5>
                            @elseif(($t->pbstatus)==1)
                            <h5 style="color: #18A15E;font-weight: bold;"> Paid</h5>
                            @elseif(($t->pbstatus)==2)
                            <h5 style="color: #E28E00;font-weight: bold;"> for billing</h5>
                          @endif
                         </td>
                       </tr>
                       @endforeach
                       <tr>
                         <td class="text-center"></td>
                         <td class="text-center"><h4 ><strong>Total</strong></h4></td>
                         <td class="text-center"></td>
                          <td class="text-center"><h4><strong>₱ {{$showDown->dcmDPAmount}}</strong> </h4></td>
                         <td class="text-center"></td>
                         <td class="text-center"><h4 ><strong>₱ {{$showDown->dblProjCost}} </strong></h4></td>
                         <td class="text-center"></td>
                         <td class="text-center"></td>
                        <td class="text-center"></td>
                       </tr>
                      </tbody>
                    </table>
                    <br>
                </div>

            <input type="hidden" name="date" id="date" >
           
          <br>
      <div class="col-md-8">
          {!! Form::open(['url'=>'billing','method'=>'post','target'=>'_blank', 'id'=>'form-insert']) !!}
        <fieldset>
              <div class=" col-md-12">
            <input type="hidden" name="invoice" id="invoice" value="{{$showDown->strContractID}}">
                @foreach($getTerms as $getTerms)
                <input type="hidden" name="term" value="{{$getTerms->intTerm}}">
                <input type="hidden" name="desc" value="{{$getTerms->strTermDate}}">

                @endforeach
                     <fieldset>
                       <label for="" class="col-sm-6"><h4><strong>Current Unsettled Account</strong></h4></label>
                    <div class="col-sm-6">
                      <a type="button" class="btn btn-lg btn-alt btn-success col-sm-6" id="btnbill" ></span></a>
                      <div id="here" class="col-sm-6"></div>
                    </div>
                     </fieldset>
                    <br>
                    <label for="" class="col-sm-3"><h4>Progress:</h4></label>
                    <p for="" id="prog" class="col-sm-9"></p> 

                    <input type="hidden" name="mode" id="mode">
                    <input type="hidden" name="getID" id="getID">

                    <label for="" class="col-sm-3"><h4>Amount:</h4></label>
                    <p for="" name="amt" id="amt" class="col-sm-9"></p>

                    <input type="hidden" name="amount" id="amount">
                    <input type="hidden" name="getstatus" id="getstatus">
                    <input type="hidden" name="getinv" id="getinv">


                    <br>
                </div>

           </fieldset>
          <div id="confirm_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="block">
                 <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Billing Confirmation</strong></h3>
                  </div>          
                    <p><h4>Confirm in billing this Client?</h4></p>
                    </div>
                    <div class="col-md-offset-9">
                        <button type="submit" class="btn btn-md btn-primary"  > Yes</button>
                        <button type="button" class="btn btn-md btn-warning" data-dismiss="modal">No</button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
              </div>
            </div>
          </div> 
          {!! Form::close() !!}


          

          {!! Form::open(['url'=>'billing','method'=>'put', 'id'=>'frm-upd']) !!}
          <div id="turnover_modal" class="modal fade edit-modal" tabindex="-1" role="dialog" aria-labelledby="EditSupplierModal" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="block">
                 <div class="block-title themed-background">
                    <div class="block-options pull-right">
                        <a href="javascript:void(0)" class="btn btn btn-default close" data-dismiss="modal"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="themed-background" style="color:white;"><strong>Turnover Confirmation</strong></h3>
                  </div>          
                    <div>
                      <div class="row col-md-offset-1">
                        <h5 for=""> <i class="hi hi-list-alt"></i> <strong>Contract No:</strong> <span id="contId"></span></h5>
                      </div>
                      <input type="hidden" id="cont" name="cont">
                      <div class="row col-md-offset-0">
                        <h4 for="" class="text-center"> <strong></strong> <span id="quoteName"></span></h4>
                      </div>
                      <div class="row col-md-offset-1">
                        <h4 for="" class="text-center"> <strong></strong> <span id="client"></span></h4>
                      </div>
                      <hr>
                      <div class="row col-md-offset-1">
                        <h5 for=""><i class="gi gi-calendar"></i> <strong>Starting Date</strong> <span id="datStart"></span></h5><h5 for=""><i class="gi gi-calendar"></i> <strong>End Date</strong> <span id="datEnd"></span></h5>
                      </div>

                

                    </div>
                    </div>
                    <div class="col-md-offset-8">
                        <button type="submit" class="btn btn-md btn-primary" > <span class="hi hi-off"></span> Turnover Project</button>
                    </div>
                    <div class="clearfix"></div>
                    <br>
              </div>
            </div>
          </div>
          {!! Form::close() !!}
            

      </div>
      <div class="col-md-4">
          <p id="demo"></p>               
          
        
      </div>
           </fieldset>

      </div>

     
    

@endsection

@section('script')
<script>
  var getin = $('#invoice').val();
  
  $(document).ready(function(){

 $('#form-validation').on('submit' ,function(e){
        var $form = $(this);
        if(! $form.valid()) return false;
      }); 

  var id = $('#cont').val();
 $('#frm-upd').on('submit' ,function(e){
        e.preventDefault();
        var formData = $('#frm-upd').serialize();
        console.log(formData);
        $.ajax({
          type : 'PUT',
          url  : id,
          data : formData,
          dataType: 'json',
          success:function(data){
          window.location = '/billing';
            
          },
          error:function(data){

          }
        })
      }); 
   
});

  function Timer()
  {
    var setdate = $('#date').val();
    // Set the date we're counting down to
var countDownDate = new Date(setdate+' 23:59:59').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("demo").innerHTML = "<h4><strong>Due Date: "+setdate+"</strong></h4><br><h4 class='text-center'>Day/s before due date: </h4><br><h4>"+ days + " days " + hours + " hours "
  + minutes + " minutes " + seconds + " seconds </h4>";

  // Display the result in the element with id="demo"
  

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "<span class='fa fa-spinner fa-2x fa-spin ''></span> Terminating Contract... ";
    close();
  }
}, 1000);
  }
  function close()
  {
     /////////////////start top loading//////////
        NProgress.start();
        ///////////////////////////////////////////
    $.ajax({
          type : 'PUT',
          url  : getin,
          dataType: 'json',
          success:function(data){
          window.location = '/billing';
            
          },
          error:function(data){

          }
        })
        /////////////////stop top loading//////////
              NProgress.done();
        ///////////////////////////////////////////
    
  }
</script>



@endsection