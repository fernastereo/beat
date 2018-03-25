<?php $users = Auth::user()->contacts(Auth::user()->id); ?>
<ul class="menu">
	@foreach($users as $user)
		<li>
			<a href="#">
		  		<div class="pull-left">
		    		<img src="{{ Storage::url($user->avatar) }}" class="img-circle" alt="User Image">
		  		</div>
	  		<p>{{ $user->first_name . ' ' . $user->last_name }}</p>
			</a>
		</li>
	@endforeach
</ul>
