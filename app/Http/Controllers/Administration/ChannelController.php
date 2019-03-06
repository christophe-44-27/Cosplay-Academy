<?php

namespace App\Http\Controllers\Administration;

use App\Forum\Models\Channel;
use App\Http\Controllers\Controller;

class ChannelController extends Controller {

	public function index() {

		$channels = Channel::orderBy('id', 'DESC')->get();
		$activeSection = 'channels';
		$action = 'list';

		return view('administration.channels_list', compact('channels', 'activeSection', 'action'));
	}
}
