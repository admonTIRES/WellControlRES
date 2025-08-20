@extends('Template/maestraUser')
@section('contenido') 
<style>

    body {  
 min-height: 45vw;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        justify-items: center;
    }

    .video-card {
        position: relative;
        background-color: #0000003f;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-weight: bold;
        font-size: 1.2rem;
        padding: 1rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 41vw;
    }

    .video-title {
        z-index: 2;
        color: #fff;
    }

    .video-wrapper {
        position: relative;
        width: 39vw;
        height: 24vw;
    }

    .cover-image,
    .video-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 39vw;
        height: 24vw;
        transition: opacity 0.3s ease;
        border-radius: 8px;
    }

    .cover-image {
        object-fit: cover;
        z-index: 1;
    }

    .video-frame {
        z-index: 0;
        opacity: 0;
        border: none;
    }

    .video-card:hover .cover-image {
        opacity: 0;
        pointer-events: none;
    }

    .video-card:hover .video-frame {
        opacity: 1;
        z-index: 2;
        pointer-events: auto;
    }
    
  header h1{
    color: white;
    margin-bottom: 2% ;
}

</style>


<div class="main-container"> 
    <div class="container">
      
             @switch($TIPO)
                @case('iadcVertical')
                  <header>
                <h1>{{ __('IADC Kill Sheet Tutorial for Vertical Wells') }}</h1>
                 </header>
                @break
                @case('iwcfVertical')
                 <header>
                <h1>{{ __('IWCF Kill Sheet Tutorial for Vertical Wells') }}</h1>
                 </header>
                @break
                @case('iwcfDeviated')
                 <header>
                <h1>{{ __('IWCF Kill Sheet Deviated Tutorial for Vertical Wells') }}</h1>
                 </header>
                @break
                @default
            @endswitch
       
        
        <div class="grid">

            @switch($TIPO)
                @case('iadcVertical')
                    <div class="video-card">
                        <div class="video-title">{{ __('Part 1') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/IADCV01.jpg" alt="Cover 1">
                            <iframe src="https://jumpshare.com/embed/Gjtuivyvre2JWlSfIxoS" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                    
                    <div class="video-card">
                        <div class="video-title">{{ __('Part 2') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/IADCV02.jpg" alt="Cover 2">
                            <iframe src="https://jumpshare.com/embed/PqOFo8RIUdbGlwZEGLFM" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                @break
                @case('iwcfVertical')
                     <div class="video-card">
                        <div class="video-title">{{ __('Part 1') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/iwcfV01.jpg" alt="Cover 1">
                            <iframe src="https://jumpshare.com/embed/PqOFo8RIUdbGlwZEGLFM" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                    
                    
                    <div class="video-card">
                        <div class="video-title">{{ __('Part 2') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/iwcfV02.jpg" alt="Cover 2">
                            <iframe src="https://jumpshare.com/embed/7275c92aAwM2kCwRPCHV" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>

                    <div class="video-card">
                        <div class="video-title">{{ __('Part 3') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/iwcfV03.jpg" alt="Cover 3">
                            <iframe src="https://jumpshare.com/embed/UcfEhdyDWh2wEuCKUTQp" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                
                    <div class="video-card">
                        <div class="video-title">{{ __('Part 4') }}</div>
                        <div class="video-wrapper">
                            <img class="cover-image" src="/assets/images/Recursos/iwcfV04.jpg" alt="Cover 4">
                            <iframe src="https://jumpshare.com/embed/u52rneVhMLtrip0362sg" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
                        </div>
                    </div>
                @break
                @case('iwcfDeviated')
                <h3>{{ __('IWCF DEVIATED WELL') }}</h3>
                @break
                @default       
            @endswitch
           
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection  
@php
    $css_identifier = 'killSheets';
@endphp