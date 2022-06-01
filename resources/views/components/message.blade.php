@props(['mes' => $mes])

<div class="card card-default mb-4">
    <div class="card-body">
        <div class="card-title text-2xl">{{ $mes->title }}</div>
            <HR SIZE=5 class="mb-2">
            <div>
                {{ $mes->body }}
            </div>
    </div>
</div>
<div class="text-right">
    <span class="font-black">時間: </span><span>{{ $mes->deadline }}</span>&emsp;&emsp;&emsp;
    <span class="font-black">From: </span><span>{{ $mes->user->username }}</span>&emsp;&emsp;&emsp;
    <span class="font-black">To: </span><span>{{ $mes->user->username }}</span>
</div>