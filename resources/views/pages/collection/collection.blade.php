@extends('layouts.app')

@section('content')
    <div id="collection-search" class="container">
        <form action="{{ route('search') }}" method="GET">
            <input id="collection-searchbar"type="text" value="{{ $searched }}" name="query" placeholder="  Search..." required>
            <button id="collection-search-button"type="submit">Search</button>
        </form>
    </div>
    <div id="collection-hr">
        
        <a href="{{ route('collection.select',['id' => 'all']) }}">
                <span>
                <img src="/img/all-icon.png">
                <div>All</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'invitation']) }}">
                <span>
                <img src="/img/invitation-icon.png">
                <div>Invitations</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'official']) }}">
                <span>
                <img src="/img/official-icon.png">
                <div>Officials</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'resume']) }}">
                <span>
                <img src="/img/resume-icon.png">
                <div>Resume</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'letter']) }}">
                <span>
                <img src="/img/letter-icon.png">
                <div>Letter</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'certificate']) }}">
                <span>
                <img src="/img/certificate-icon.png">
                <div>Certificate</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'advertisement']) }}">
                <span>
                <img src="/img/advertisement-icon.png">
                <div>Advertise</div>
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'poster']) }}">
                <span>
                <img src="/img/poster-icon.png">
                <div>Poster</div>   
                </span>
        </a>
        <a href="{{ route('collection.select',['id' => 'media']) }}">
                <span>
                <img src="/img/media-icon.png">
                <div>Media</div>   
                </span>
        </a>
    </div>
        @if(isset($results))
                        @php
                                $Verticals = $results->filter(function ($item) {
                                return $item->page_type === 'vertical';
                                });

                                $chunks = $Verticals->chunk(9);        
                        @endphp

                        @for ($i = 0; $i < $chunks->count(); $i++)
                        @php
                                $chunk = $chunks[$i];
                        @endphp
                        <div class="collection-collect-vertical">
                        @foreach ($chunk as $result)
                               
                                <a href="{{ route('form.any',['id' => $result->sid]) }}"><abbr title="{{$result->paper_size}}"><img style="margin:10px;width:300px;height:500px;border-radius:10px;" src="{{ asset($result->template_type) }}" alt="Template Image"></abbr></a>
                                
                        @endforeach
                        </div>
                        @endfor


                        @php
                                $Horizontals = $results->filter(function ($item) {
                                return $item->page_type === 'horizontal';
                                });

                                $chunks = $Horizontals->chunk(9);
                                 
                        @endphp

                        @for ($i = 0; $i < $chunks->count(); $i++)
                        @php
                        $chunk = $chunks[$i];
                        @endphp
                        <div class="collection-collect-horizontal">
                        @foreach ($chunk as $result)
                                
                                <a href="{{ route('form.any',['id' => $result->sid]) }}"><abbr title="{{$result->paper_size}}"><img style="margin:10px;width:250px;height:150px;border-radius:10px;" src="{{ asset($result->template_type) }}" alt="Template Image"></abbr></a>
                                
                        @endforeach
                        </div>
                        @endfor

        @else
                        @php
                                $Verticals = $forms->filter(function ($item) {
                                return $item->page_type === 'vertical';
                                });

                                $chunks = $Verticals->chunk(9);        
                        @endphp

                        @for ($i = 0; $i < $chunks->count(); $i++)
                        @php
                                $chunk = $chunks[$i];
                        @endphp
                        <div class="collection-collect-vertical">
                        @foreach ($chunk as $form)
                               
                                <a href="{{ route('form.any',['id' => $form->sid]) }}"><abbr title="{{$form->paper_size}}"><img style="margin:10px;width:300px;height:500px;border-radius:10px;" src="{{ asset($form->template_type) }}" alt="Template Image"></abbr></a>
                                
                        @endforeach
                        </div>
                        @endfor


                        @php
                                $Horizontals = $forms->filter(function ($item) {
                                return $item->page_type === 'horizontal';
                                });

                                $chunks = $Horizontals->chunk(9);
                                 
                        @endphp

                        @for ($i = 0; $i < $chunks->count(); $i++)
                        @php
                        $chunk = $chunks[$i];
                        @endphp
                        <div class="collection-collect-horizontal">
                        @foreach ($chunk as $form)
                                
                                <a href="{{ route('form.any',['id' => $form->sid]) }}"><abbr title="{{$form->paper_size}}"><img style="margin:10px;width:250px;height:150px;border-radius:10px;" src="{{ asset($form->template_type) }}" alt="Template Image"></abbr></a>
                                
                        @endforeach
                        </div>
                        @endfor

                        
        @endif
        <div id="collection-sections">
                <div class="collection-section" onClick="showingRows(0)">1</div>
                <div class="collection-section" onClick="showingRows(1)">2</div>
                <div class="collection-section" onClick="showingRows(2)">3</div>
                <div class="collection-section" onClick="showingRows(3)">4</div>
        </div>
<style>
        #collection-sections{
                margin:auto;
                display:flex;
                width:280px;
                align-items:center;

        }
        .collection-section{
                width:50px;
                height:50px;
                display:flex;
                align-items:center;
                justify-content:center;
                background-color:#D7BDE2;
                border:2px solid black;
                color:black;
                font-size:25px;
                margin:10px;
        }
        .collection-section:hover{
                width:40px;
                height:40px;
                
        }
        #collection-search{
                height:200px;
                display: flex;
                align-items:center;
                justify-content:center;
                background-color:#D7BDE2;
        }
        #collection-searchbar{
                background-color:transparent;
                width:400px;
                height:40px;
                border-radius:20px 0 0 20px;
                border:5px solid black;
        }
        #collection-search-button{
                height:40px;
                width:80px;
                border-radius:0 20px 20px 0;
                background-color:#BB8FCE;
                border:5px solid black;
        }
        #collection-hr{
                
                background-color:#BB8FCE  ;
                margin-bottom:20px;
                display:flex;
                align-items:center;
                justify-content:center;
                flex-wrap:wrap;
        }
        #collection-hr span{
                padding:10px;
                margin: 20px;
                width:70px;
                height:70px;
                border-radius:5px;
                background-color:#f5eef8;
                font-weight:bolder;
                display:flex;
                flex-direction:column;
                align-items:center;
                justify-content:center;
                font-size:13px;
        }
        #collection-hr img{
                width:40px;
                height:40px;
        }
        #collection-hr a{
                text-decoration:none;
        }
        .collection-collect-vertical{
                width:1000px;
                margin: auto;
                display: flex;
                align-items: center;
                justify-content: space-around;
                flex-wrap: wrap;
                background-color:#D7BDE2;
        }
        .collection-collect-horizontal{
                width:1000px;
                margin: auto;
                display: flex;
                align-items: center;
                justify-content: space-around;
                flex-wrap: wrap;
                background-color:#D7BDE2;
                margin-top:10px;
        }
        /* Responsive layout - makes a two column-layout instead of four columns */
        @media(max-width:1100px){
        .collection-collect{
                width:100%;
        }

        }
        @media(max-width:900px){
        .collection-collect{
                justify-content: space-evenly;
        }
        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
        #collection-searchbar{
        width:200px;
        }
        
        }
</style>
<script>
        showingRows(0)
        
        function showingRows(x){
                sections1=document.getElementsByClassName("collection-collect-vertical");
                sections2=document.getElementsByClassName("collection-collect-horizontal");
                for(var i=0; i<sections1.length ; i++){
                        sections1[i].style.display="none";
                       
                }
                for(var i=0; i<sections2.length ; i++){
                        
                        sections2[i].style.display="none";
                }
                sections1[x].style.display="flex";
                sections2[x].style.display="flex";
        }
        
</script>
@endsection