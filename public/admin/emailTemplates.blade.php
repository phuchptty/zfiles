@extends('admin.index')
@section('admin.main')
    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">
                <i class="fa fa-fw fa-envelope-o"></i> E-Mail Templates 
            </h4>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>                    
                <li class="active">
                    <i class="fa fa-send"></i> Email Settings
                </li>                
                <li >
                <i class="fa fa-envelope-o"></i> E-Mail Templates 
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    
    <div class="row">

            @if($errors->any() )
                <div class="col-md-12">
                    <div style="padding:8px;margin-bottom:25px;"
                     class="alert alert-danger text-left" role="alert">
                    <ul style="list-style:none;" >
                        {{ implode('',$errors->all('
                            <li ><i class="fa fa-exclamation-circle"></i> :message</li>
                            '))
                         }}
                    </ul>
                    </div>
                </div>

            @endif    
          
           @if(Session::has('Message'))
                  <div class="col-md-12">
                  {{ Session::get('Message') }}
                </div>

            @endif

            {{ Form::open( array(
                'role' => 'form',
                'files'=> true

            ) ) }}       
            
            
                  <div class="col-md-12">
            <div class="panel panel-primary">
                 
                  <div class="panel-heading">
                    <label for="maxFileSize">
                       <i class="fa fa-send"></i> E-Mail - User Signup 
                    </label>
                    </div>

                  <div class="panel-body">
                        <div class="col-md-12">
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="welcomeSubject">
                                   Email Subject 
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('welcomeSubject',
                                      $data['welcomeSubject'],array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Subject</span>
                                </div>   
                               </div>
                            </div>

                        </div>
                        </div>
            
                        <div class="col-md-12">

                        <div class="panel panel-default">


                              <div class="panel-body">
                                <div class="form-group">
                                   
                                    <span>To Customize Message Content Edit File On Path 
                                    <code>Public/emails/welcome.blade.php</code><br>
                                    </span>
                                                                                                         <small style="font-size:11px;">
                         * <i class="fa fa-info"></i> Litle HTML knowledge Needed.</small>
                               </div>
                            </div>

                        </div>

                    </div>

            </div>

    </div>
    
    </div>
            
            
            <div class="col-md-12">
            <div class="panel panel-primary">
                 
                  <div class="panel-heading">
                    <label for="maxFileSize">
                       <i class="fa fa-send"></i> E-Mail - Files Receivers
                    </label>
                    </div>

                  <div class="panel-body">
                        <div class="col-md-12">
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="sendFilesSubject">
                                   Email Subject 
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('sendFilesSubject',
                                      $data['sendFilesSubject'],array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Subject</span>
                                </div>   
                               </div>
                            </div>

                        </div>
                        </div>
            
                        <div class="col-md-12">

                        <div class="panel panel-default">


                              <div class="panel-body">
                                <div class="form-group">
                                    <span>To Customize Message Content Edit File On Path 
                                    <code>Public/emails/sendFiles.blade.php</code><br>
                                    </span>
                                                                                                         <small style="font-size:11px;">
                         * <i class="fa fa-info"></i> Litle HTML knowledge Needed.</small>
                               </div>
                            </div>

                        </div>

                    </div>

            </div>

    </div>

    </div>



            </div>

    </div>
    
    </div>
            
            
            <div class="col-md-12">
            <div class="panel panel-primary">
                 
                  <div class="panel-heading">
                    <label for="maxFileSize">
                       <i class="fa fa-send"></i> E-Mail - Recover Password
                    </label>
                    </div>

                  <div class="panel-body">
                        <div class="col-md-12">
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="recoverEmailSubject">
                                   Email Subject 
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('recoverEmailSubject',
                                      $data['recoverEmailSubject'],array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Subject</span>
                                </div>   
                               </div>
                            </div>

                        </div>
                        </div>
            
                        <div class="col-md-12">

                        <div class="panel panel-default">


                              <div class="panel-body">
                                <div class="form-group">
                                    <span>To Customize Message Content Edit File On Path 
                                    <code>Public/emails/auth/reminder.blade.php</code><br>
                                    </span>
                                                                                                         <small style="font-size:11px;">
                         * <i class="fa fa-info"></i> Litle HTML knowledge Needed.</small>
                               </div>
                            </div>

                        </div>

                    </div>

            </div>

    </div>

    </div>
   
       
        <div class="clearfix"></div>
        <div class="col-md-6 pull-left">

            <div class="form-group  ">
                {{ Form::button('<i class="fa fa-fw fa-save"></i> Save', array(
                   'type' => 'submit',
                   'class' => 'btn btn-success  btn-block'
                   ));
                }}
            </div>
            <br >

        </div>

    </div>



                 {{ Form::close() }}

@endsection
@stop