@extends('admin.index')
@section('admin.main')
    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">
                <i class="fa fa-server"></i> Mail Server
            </h4>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>                    
                <li class="active">
                    <i class="fa fa-send"></i> Email Settings
                </li>                
                <li >
                    <i class="fa fa-server"></i> Mail Server
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
            <input style="display:none" type="text" name="fakeusernameremembered"/>
            <input style="display:none" type="password" name="fakepasswordremembered"/>
            <div class="col-md-12">
            <div class="panel panel-primary">
                 
                  <div class="panel-heading">
                    <label for="maxFileSize">
                       <i class="fa fa-server"></i> Local server
                    </label>
                    </div>

                  <div class="panel-body">
                        <div class="col-md-6">
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="emailFromName">
                                   Email from ( Name )
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('emailFromName',
                                      EmailSettings::find(1)->emailFromName,array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Name</span>
                                </div>   
                               </div>
                            </div>

                        </div>
                        </div>
            
                        <div class="col-md-6">

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="emailFromEmail">
                                   Email from (E-Mail)
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::email('emailFromEmail',
                                      EmailSettings::find(1)->emailFromEmail,array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">E-mail</span>
                                </div>   
                               </div>
                            </div>

                        </div>

                    </div>

            </div>

    </div>
    
    <div class="panel panel-primary">
                 
                  <div class="panel-heading">
                    <label for="maxFileSize">
                       <i class="fa fa-globe"></i> SMTP Server
                    </label>
                        <small class=" text-danger" style="font-size:12px;">
                            
                            ( <i class="fa fa-info"></i> Leave All Fields empty if you do not want Set STMP Server.)
                        </small> 
                    </div>

                  <div class="panel-body">
                        <div class="col-md-6">
                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="SMTPHostAddress">
                                   SMTP Host Address
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::text('SMTPHostAddress',
                                      EmailSettings::find(1)->SMTPHostAddress,array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Host</span>
                                </div>   
                               </div>
                            </div>

                        </div>
                        </div>
            
                        <div class="col-md-6">

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="SMTPHostPort">
                                   SMTP Host Port
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                <div class="input-group">
                                    {{ Form::number('SMTPHostPort',
                                        EmailSettings::find(1)->SMTPHostPort,array(
                                       'class'=>'form-control'
                                    )) }}
                                    <span class="input-group-addon">Port</span>
                                </div>   
                               </div>
                            </div>

                        </div>

                    </div>
                    
                    <div class="col-md-6">

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="EMailEncryptionProtocol">
                                   E-Mail Encryption Protocol
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                @if(EmailSettings::find(1)->EMailEncryptionProtocol == 'ssl')
                                    <?php @$protocol = 'ssl' ?>
                                @elseif(EmailSettings::find(1)->EMailEncryptionProtocol == 'tls')
                                    <?php @$protocol = 'tls' ?>
                                @endif

                                    {{  Form::select('EMailEncryptionProtocol',
                                     array('ssl' => 'SSL', 'tls' => 'TLS'),@$protocol,
                                     array('class' => 'form-control')) }}
                                </div>   
                               </div>
                            </div>

                    </div>
                    
                    <div class="col-md-6">

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="SMTPServerUsername">
                                   SMTP Server Username
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        {{ Form::text('SMTPServerUsername',
                                          EmailSettings::find(1)->SMTPServerUsername,array(
                                           'class'=>'form-control',
                                           'autocomplete' => 'off'
                                        )) }}
                                        <span class="input-group-addon">User</span>
                                    </div>   
                                </div>   
                               </div>
                            </div>

                    </div>
                    <div class="col-md-6">

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                <label for="SMTPServerPassword">
                                   SMTP Server Password
                                </label>
                                </div>

                              <div class="panel-body">
                                <div class="form-group">
                                    <div class="input-group">
                                        {{ Form::password('SMTPServerPassword',array(
                                           'class'=>'form-control'
                                        )) }}
                                        <span class="input-group-addon">password</span>
                                        
                                    </div>
                                    <small style="font-size:11px;">
                                        <i class="fa fa-info"></i> 
                                        Leave empty if you do not want to change it
                                    </small>   
                                </div>   
                               </div>
                            </div>

                        </div>
                                                
                    </div>

            </div>

    </div>
    
    </div>
       
        <div class="clearfix"></div>
        <div class="col-md-6 pull-right">

            <div class="form-group ">
                {{ Form::button('<i class="fa fa-save"></i> Save', array(
                   'type' => 'submit',
                   'class' => 'btn btn-success  btn-block'
                   ));
                }}
            </div>
            <br >

        </div>

        


                 {{ Form::close() }}

@endsection
@stop