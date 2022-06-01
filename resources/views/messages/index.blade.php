@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            {{--留言板--}}
            <div class="card card-default mb-4">
                <div class="card-body">
                    <p class="card-title text-2xl">Messages</p>
                    <table class="table table-striped task-table mb-0">
                        <thead class="font-black text-lg">
                            <tr>
                                <td>留言</td>
                                <td>時間</td>
                                @auth
                                <td class="text-md-right text-sm-right">選項</td>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($mess as $mes)
                            <tr>
                                <td><a href="{{ route('message.show', $mes->id) }}">{{ $mes->title }}</a></td>
                                <td>{{ $mes->deadline }}</td>
                                @auth
                                <td class="text-md-right text-sm-right">
                                    <div class="inline-flex">
                                        @if(($mes->user_id == auth()->id()) or ($mes->toUser == auth()->id()) or ($mes->toUser == 0))
                                        <div class="mr-1">
                                            <form action="/message/{{ $mes->id }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-success">完成</button>
                                            </form>
                                        </div>
                                        @endif
                                        @if($mes->user_id == auth()->id())
                                        <div>
                                            <form action="/message/{{ $mes->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">X</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                                @endauth
                            </tr>
                            <tr>
                                <td><span class="font-bold text-lg">From: </span> {{ $mes->user->username }} <span class="font-bold text-lg"> To: </span>{{ $mes->toUserName }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{--新增--}}
            @auth
                <form action="{{ route('message') }}" method="post">
                    @csrf
                    <div class="mb-1">
                        <input name="title" id="title" class="bg-gray-100 border-2 rounded-lg w-80 p-1"
                               type="text" maxlength="20" placeholder="標題(限20字內)">
                    </div>
                    <div class="mb-1">
                        <textarea name="body" id="body" cols="30" rows="2" class="bg-gray-100 border-2 w-4/6 p-2
                            rounded-lg @error('body') border-red-500 @enderror"
                            placeholder="在這裡輸入訊息，點下面的新增按鈕存檔!"></textarea>

                        @error('body')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div style="display: flex;">
                        <div class="mb-2 mr-2">
                            <input name="deadline" id="deadline" class="date bg-gray-100 border-2 rounded-lg w-80 p-1"
                                   type="text" placeholder="選擇日期">
                        </div>
                        <div>
                            <label for="select">選擇對象</label>
                            <select class="bg-gray-100 border-2 rounded-lg w-80 p-1" name="select">
                                <option value="0">請選擇</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->username}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 font-medium
                        rounded">新增</button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
    <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
