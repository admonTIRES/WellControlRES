@extends('Template/maestraUser')
@section('contenido') 
<style>
    .grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
        justify-items: center;
    }

    .video-card {
        position: relative;
        background-color: #f0f0f0;
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
        width: 720px;
    }

    .video-title {
        margin-bottom: 0.5rem;
        z-index: 2;
    }

    .video-wrapper {
        position: relative;
        width: 700px;
        height: 500px;
    }

    .cover-image,
    .video-frame {
        position: absolute;
        top: 0;
        left: 0;
        width: 700px;
        height: 500px;
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
    }

    .video-card:hover .video-frame {
        opacity: 1;
        z-index: 2;
    }
</style>


<div class="main-container"> 
    <div class="container">
        <header>
            <h1>{{ __('IWCF Kill Sheet Tutorial for Vertical Wells') }}</h1>
        </header>
        
        <div class="grid">
    <div class="video-card">
        <div class="video-title">{{ __('Part 1') }}</div>
        <div class="video-wrapper">
            <img class="cover-image" src="/assets/images/killsheets/part1iwcf.png" alt="Cover 1">
            <iframe class="video-frame" src="https://drive.google.com/file/d/1se3ugR6bXsRHvBHaOZAOvRrClzJvNBjW/preview" allowfullscreen></iframe>
        </div>
    </div>

    <div class="video-card">
        <div class="video-title">{{ __('Part 2') }}</div>
        <div class="video-wrapper">
            <img class="cover-image" src="/assets/images/covers/cover2.jpg" alt="Cover 2">
            <iframe id="js_video_iframe" src="https://jumpshare.com/embed/KkcH9kNSZnBbTnctAHs5" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>
        </div>
    </div>

    <div class="video-card">
        <div class="video-title">{{ __('Part 3') }}</div>
        <div class="video-wrapper">
            <img class="cover-image" src="/assets/images/covers/cover3.jpg" alt="Cover 3">
            <iframe id="js_video_iframe" src="https://jumpshare.com/embed/KkcH9kNSZnBbTnctAHs5" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

        </div>
    </div>

    <div class="video-card">
        <div class="video-title">{{ __('Part 4') }}</div>
        <div class="video-wrapper">
            <img class="cover-image" src="/assets/images/covers/cover4.jpg" alt="Cover 4">
            <iframe id="js_video_iframe" src="https://jumpshare.com/embed/KkcH9kNSZnBbTnctAHs5" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></iframe>

        </div>
    </div>
</div>
        <div class="white-section steps-section">
            
            <h2 class="steps-title">
                <img src="/assets/images/principal/logoSmithMasonCO.png" />
            </h2>
            
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection  

@php
    $css_identifier = 'killSheets';
@endphp