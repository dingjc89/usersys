{{--页码--}}
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info">
            显示 {{$data->firstItem()}} 到 {{$data->lastItem()}} 项，共 {{$data->lastPage()}} 页
        </div>
    </div>
    <div class="col-sm-6">
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination" style="margin: 0;float: right;">
                <li class="paginate_button previous"><a href="@if($data->previousPageUrl()) {{$data->previousPageUrl()}} @else # @endif">上一页</a></li>
                @for($i=1; $i<=$data->lastPage(); $i++)
                    @if($i<7)
                        <li class="paginate_button @if($i==$data->currentPage())active @endif"><a href="{{$data->url($i)}}">{{$i}}</a></li>
                    @endif
                @endfor
                <li class="paginate_button next"><a href="@if($data->nextPageUrl()){{$data->nextPageUrl()}}@else # @endif">下一页</a></li>
            </ul>
        </div>
    </div>
</div>
{{--end 页码--}}