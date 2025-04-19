@if($message = Session::get('success'))
 <div class="alert alert-success alert-block">
 <button type="button" class="close" datadismiss="alert">X</button>
 <strong>{{ $message }}</strong>
 </div>
@endif
@if ($message = Session::get('successupdate')) 
<div class="alert alert-success alert-block"> 
    <button type="button" class="close" datadismiss="alert">X</button> 
    <strong>{{ $message }}</strong> 
</div> 
@endif 
@if ($message = Session::get('successdelete')) 
<div class="alert alert-success alert-block">     <button type="button" class="close" datadismiss="alert">X</button> 
    <strong>{{ $message }}</strong> 
</div> 
@endif 
