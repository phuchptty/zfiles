@extends('user.--index')
@section('style')
    <!-- Confirm Dialog css -->
    {{ HTML::style('public/themes/defualt/assets/css/jquery.frontbox-1.1.css') }}
@endsection

@section('content')

    <div class="header-content">
     
      <div class="col-md-12">
       
        <div class="panel panel-default">
          
          <div class="panel-heading">
            <i style="font-size:18px;" class="fa fa-send">
            </i> Send Files Via Email        
          </div>
          
          <div class="panel-body">
               <div class="row">
                <div class="col-md-6">
                <div id="message-success" style="display:none;" class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <strong>Well!</strong> 
                  your message has been sent successfully.
                </div>
                <div id="message-error" style="display:none;" class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <strong>Oop!</strong> 
                  Sorry Email delivery failure.
                </div>
                  
                </div>
                   <div class="clearfix"></div>
                   <div class="col-md-6 text-left">
                       
                        {{ Form::open( array(
                            'role' => 'form'

                        ) ) }}
                       
                        {{ Form::label('email','Recipient Emails : ') }}
                       <br><small><i class="fa fa-info"></i>
                        Use (Space) To Add Another Email</small>

                       {{ Form::text('email','',array(
                        'class'=>'form-control',
                        'placeholder'=>'Recipient Emails',
                        'id' => 'rec_email'
                        )) }}
                    
                        <br>    
                    {{ Form::button('<i class="fa fa-send"></i> Send', array(
                       'class' => 'btn btn-primary  btn-block',
                       'id' => 'send'
                       ));
                    }}
                        
                    </div>

               </div>
               <hr class="light">

            <h4 style="color:#2C3E50;" class="text-left">Please Select Files</h4>

            <table id="table-pagination" data-toggle="table"
                data-classes="table table-bordered table-striped table-hover"
                data-search="true"
                data-search-align="left"

            >
              <thead>
                <tr>
                    <th data-field="state" >
                        <i class="fa fa-check-square-o"></i>
                        
                    </th>
                    <th class=" hidden-xs" data-sortable="true" data-field="id">
                        <i class="fa fa-list-ol"></i>
                    </th>
                    
                    <th class=" hidden-xs" data-field="type">
                        <i class="fa fa-filter"></i> Type
                    </th>
                    <th data-search="true" data-field="name">
                        <i class="fa fa-file-text-o"></i> Name
                    </th>

                    <th class=" hidden-xs" class=" hidden-xs" title="File Status" data-search="false" data-field="status">
                        <i class="fa fa-globe"></i>
                    </th>

                    <th data-search="false" data-field="fileLink">
                        <i class="fa fa-link"></i> File Link
                    </th>

                </tr>                
             
                </thead>
                <tbody style="text-align:left;">
                   
                    @foreach($data['userFiles'] as $key=>$file)
                           
                    <t  id="tr-{{ $key+1 }}" >
                        <td >

                {{ Form::checkbox('selectedFiles[]',$file->id,null,
                          array(
                           'id'=> 'select-'.($key +1),
                           'data-id' => $file->id)
                           )
                        }}
                        
                        </td>
                        <td class=" hidden-xs" style="display:none;" data-field="id"> {{ $key+1 }} </td>
                        <td class=" hidden-xs" data-field="type">
                          @if ($file->fileExt === 'jpg' )
                            <i class="fa fa-picture-o"></i> {{ $file->fileExt }} 
                          @elseif ($file->fileExt === 'jpg')
                            <i class="fa fa-picture-o"></i> {{ $file->fileExt }}
                          @elseif ($file->fileExt === 'png')
                            <i class="fa fa-picture-o"></i> {{ $file->fileExt }}
                          @elseif ($file->fileExt === 'zip')
                            <i class="fa fa-file-archive-o"></i> {{ $file->fileExt }}
                          @elseif ($file->fileExt === 'mp3')
                            <i class="fa fa-music"></i> {{ $file->fileExt }}
                          @elseif ($file->fileExt === 'exe')
                            <i class="fa fa-cog"></i> {{ $file->fileExt }}
                          @elseif ($file->fileExt === 'mp4')
                            <i class="fa fa-film"></i> {{ $file->fileExt }}
                          @else
                            <i class="fa fa-file-text-o"></i> {{ $file->fileExt }}
                          @endif
                        </td>
                        <td data-field="name">
                          {{ mb_substr($file->fileName,0,20,"utf-8") }}
                        </td>

                        <td class=" hidden-xs" data-field="status">
                          @if ($file->fileStatus == 1 )
                          <i class="fa fa-check"></i>
                          @else
                          <i class="fa fa-times"></i> 
                          @endif
                        </td>                   

                        <td data-field="fileLink">

                            <a target="_blank" style="text-decoration:underline;
                            font-size:14px;" href="{{ $file->filePath }}">
                             <i class="fa fa-external-link"></i>
                              {{ mb_substr(html_entity_decode($file->fileName),0,20,"utf-8") }}
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
              
            </table>
                 {{ Form::close() }}

          </div>
          
        </div> <!-- /# END panel default -->
        
      </div> <!-- /# END col-md 12 --> 
       
    </div> <!-- /# END HEADER CONTETNT -->
@endsection

@section('javascript')
<!-- Bootstrap Core JavaScript -->
{{ HTML::script('public/themes/defualt/assets/js/tables.min.js') }}
{{ HTML::script('public/themes/defualt/assets/js/multiple-emails.js') }}

<script>
    $(document).ready(function(){

    // Callback Function To Get Delete ID
    function createCallback( i ){
        return function(){
            window.id = $(this).data("id");
            window.tr = i;
        }
    }
        
        
    $("#send").click(function() {
                $(this).removeClass('btn btn-primary').addClass('btn btn-primary m-progress btn-disabled');

            var arr = $.map($('input:checkbox:checked'), function(e,i) {
                return +e.value;
            });
        var email = $("#rec_email").val(); 


              $.ajax({

                url: window.location,
                type: 'post',
                dataType: "JSON",
                data: {
                    "email": email,
                    "id": arr,
                    "_token": "{{ csrf_token() }}"
                },
                success: function (){
                        $('#send').removeClass("btn btn-primary m-progress btn-disabled").addClass('btn btn-primary');
                    $('#message-success').css({"display":"block"})

                },error: function (){
                        $('#send').removeClass("btn btn-primary m-progress btn-disabled").addClass('btn btn-primary');
                    $('#message-error').css({"display":"block"})
                }
        });
    });
        

    // select File Loop To get Checked Item ID
      for(var i = 1; i <= {{ count($data['userFiles']) }}; i++) {
          $('#select-' + i).click( createCallback( i ) );  
      }

});

    		//Plug-in function for the bootstrap version of the multiple email
		$(function() {
			//To render the input device to multiple email input using BootStrap icon
			$('#rec_email').multiple_emails();
			//OR $('#example_emailBS').multiple_emails("Bootstrap");
		
		});
    
</script>
@endsection
@stop