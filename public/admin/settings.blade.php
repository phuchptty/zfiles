@extends('admin.index')
@section('admin.main')
    
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">
                    <i class="fa fa-globe"></i> Website Settings
            </h4>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>                
                <li >
                    <i class="fa fa-globe"></i> Website Settings
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    
    <div class="row">
        
        <div class="col-md-12">
           @if(Session::has('Message'))
                  {{ Session::get('Message') }}
            @endif
        </div>
        
        <div class="col-md-7">

            
            {{ Form::open( array(
                'role' => 'form',
                'files'=> true

            ) ) }}
           
           
          <div class="form-group">
               {{ Form::label( 'sitename','Website Name') }}
               
               {{ Form::text('sitename',$data['settings']->sitename ,array(
               'class'=>'form-control',
               'placeholder'=>Lang::get('main.sitename')
               )) }}
           </div>
                
            <div class="form-group">
               {{ Form::label('email','Website Email') }}
                
               {{ Form::text('email',$data['settings']->email ,array(
                'class'=>'form-control',
                'placeholder'=>Lang::get('main.email')
                )) }}
            </div>            
              
            <div class="form-group">
               {{ Form::label('description','Website Description') }}
                
               {{ Form::textarea('description',$data['settings']->description ,array(
                'class'=>'form-control',
                'rows'=>'4',
                'placeholder'=>Lang::get('main.description')
                )) }}
            </div>
                        
            <div class="form-group">
               {{ Form::label('keywords','Website Keywords') }}
                
               {{ Form::textarea('keywords',$data['settings']->keywords ,array(
                'class'=>'form-control',
                'rows'=>'4',
                'placeholder'=>Lang::get('main.keywords')
                )) }}
            </div>            
              
            <div class="form-group">
               {{ Form::label('site_status','Website Status') }} 
             <br > 
                
             <div class="btn-group" data-toggle="buttons">
               
                <label class="btn btn-primary 
                  <?php echo ($data['settings']->site_status ==  1 ? 'active' : '')?>
                ">
                   <input name="site_status" type="radio" value="1" id="site_status"
                   <?php echo ($data['settings']->site_status ==  1 ? 'checked="checked" ' : '')?> > 
                    <i class="fa fa-globe"></i>
                    Online 
                </label>
                
                <label class="btn btn-primary 
                  <?php echo ($data['settings']->site_status ==  0 ? 'active' : '')?>
                ">
                    <input name="site_status" type="radio" value="0" id="site_status"
                    <?php echo ($data['settings']->site_status ==  0 ? 'checked="checked" ' : '')?> >          
                    <i class="fa fa-power-off"></i>
                    Offline 
                </label>
                
 
             </div>
                
            </div>
            <br >
            <div class="form-group">
                {{ Form::button('<i class="fa fa-fw fa-save"></i> Save', array(
                   'type' => 'submit',
                   'class' => 'btn btn-success  btn-block'
                   ));
                }}
            </div>
          
        </div>
        <div class="col-md-5">
                      
            <div class="panel panel-default">
                  <div class="panel-heading">
                    {{ Form::label( 'site_favicon','Website Favicon (PNG)' ) }}
                    </div>
                  <div class="panel-body">
                    <div class="form-group">

                   {{ Form::file('site_favicon','',array(
                   'class'=>'form-control'
                   )) }}
                   </div>
                </div>
            </div>

            <div class="panel panel-default">
                  <div class="panel-heading">
                    {{ Form::label( 'site_logo','Website Logo (PNG)' ) }}
                    </div>
                  <div class="panel-body">
                    <div class="form-group">

                   {{ Form::file('site_logo','',array(
                   'class'=>'form-control'
                   )) }}
                   </div>
                </div>
            </div>   

       </div>
                 {{ Form::close() }}

    </div>


@endsection
@stop