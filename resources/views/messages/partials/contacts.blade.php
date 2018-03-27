<?php $users = Auth::user()->contacts(Auth::user()->id); ?>
<ul class="menu">
	@foreach($users as $user)
		<li>
			<a href="{{ route('messages.show', $user->id) }}">
		  		<div class="pull-left">
		    		<img src="{{ Storage::url($user->avatar) }}" class="img-circle" alt="User Image">
		  		</div>
	  			<h4>{{ $user->first_name . ' ' . $user->last_name }}</h4>
	  			<p>{{ $user->company->name }}</p>
			</a>
		</li>
	@endforeach
</ul>
