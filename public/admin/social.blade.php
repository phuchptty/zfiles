@extends('admin.index')
@section('admin.main')
    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">
                <i class="fa fa-fw fa-connectdevelop"></i> Social Media Settings 
            </h4>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>                
                <li >
                    <i class="fa fa-fw fa-connectdevelop"></i> Social Media Settings
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
           
            <div class="panel panel-default">
                  <div class="panel-heading">
                    <label for="facebookLink">
                        <i style="font-size:16px;" class="fa fa-facebook-square "></i>
                         Facebook  Link <small style="font-size:11px;" >
                         ( <i class="fa fa-info"></i> Leave empty to disable it)</small>

                    </label>
                    </div>
                  
                  <div class="panel-body">
                    <div class="form-group">
                    <div class="input-group">
                        {{ Form::url('facebookLink',
                          @$data['socialLinks']->facebookLink,array(
                           'class'=>'form-control'
                        )) }}
                        <span class="input-group-addon">
                        <i class="fa fa-link"></i> Link</span>
                    </div>
   
                   </div>
                </div>
                
            </div>

        </div>
        <div class="col-md-12">
           
            <div class="panel panel-default">
                  <div class="panel-heading">
                    <label for="twitterLink">
                        <i style="font-size:16px;" class="fa fa-twitter-square "></i> Twitter Link
                        <small style="font-size:11px;" >
                        ( <i class="fa fa-info"></i> Leave empty to disable it)</small>
                    </label>
                    </div>
                  
                  <div class="panel-body">
                    <div class="form-group">
                    <div class="input-group">
                        {{ Form::url('twitterLink',
                          @$data['socialLinks']->twitterLink,array(
                           'class'=>'form-control'
                        )) }}
                        <span class="input-group-addon">
                        <i class="fa fa-link"></i> Link</span>
                    </div>   
                   </div>
                </div>
                
            </div>

        </div>
        <div class="col-md-12">
           
            <div class="panel panel-default">
                  <div class="panel-heading">
                    <label for="googlePlusLink">
                        <i style="font-size:16px;" class="fa fa-google-plus-square "></i> Google Plus Link <small style="font-size:11px;" >
                        ( <i class="fa fa-info"></i> Leave empty to disable it)</small>
                    </label>
                    </div>
                  
                  <div class="panel-body">
                    <div class="form-group">
                    <div class="input-group">
                        {{ Form::url('googlePlusLink',
                          @$data['socialLinks']->googlePlusLink,array(
                           'class'=>'form-control'
                        )) }}
                        <span class="input-group-addon">
                        <i class="fa fa-link"></i> Link</span>
                    </div>   
                   </div>
                </div>
                
            </div>

        </div>
        <div class="clearfix"></div>
        <div class="col-md-6">

            <div class="form-group">
                {{ Form::button('<i class="fa fa-save"></i> Save', array(
                   'type' => 'submit',
                   'class' => 'btn btn-success  btn-block'
                   ));
                }}
            </div>
            <br >

        </div>
                 {{ Form::close() }}

    </div>




@endsection
@stop