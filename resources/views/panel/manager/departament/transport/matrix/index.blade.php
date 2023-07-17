@extends('layouts.panel')

@section('title')
    Ustawienia Panelu - Panel Zarządzania Wirtualnego Pomorza
@endsection

@section('custom-style')
    <link rel="stylesheet" href="https://unpkg.com/balm-ui/dist/balm-ui.css" />
    <style>
        body {
            /* background-color: #bfbaba */
        }

        #preloader {
            width: 100%;
            height: 100%;
            opacity: 0.6 ;
            position: fixed!important;
            z-index: 11;
            top: 0;
            left: 0;
            overflow: none;
        }

        #preloader svg {
            position: absolute;
            top: 50%;
            left: calc(50% - 30px);
        }

        #preloader a {
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
            bottom: 8px;
            left: 8px;
            text-decoration: none;
            color: grey;
            animation: 3s fadeIn;
            animation-fill-mode: forwards;
            visibility: hidden;
        }

        .loader ellipse {
            stroke-dasharray: 10, 9999;
            animation: load 2s cubic-bezier(0.8, 0.25, 0.25, 0.9) infinite, spin 2s linear infinite;
            transform-origin: center;
        }

        @keyframes load {
            50% {
                stroke-dasharray: 140;
                stroke-dashoffset: 0;
                transform: rotateZ(0deg);
            }

            100% {
                stroke-dasharray: 146;
                stroke-dashoffset: -156;
            }
        }

        @keyframes spin {
            to {
                transform: rotateZ(360deg);
            }
        }

        @keyframes fadeIn {
            99% {
                visibility: hidden;
            }

            100% {
                visibility: visible;
            }
        }
    </style>
@endsection

@section('header')

@endsection

@section('content')
    <div id="app">

        <matrixapp-component>
    </div>
    <script>
        const previewCanvas = document.getElementById("previewCanvas");
        const previewCtx = previewCanvas.getContext('2d');
        const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext('2d');

        this.previewCanvas = previewCanvas;
        this.previewCtx = previewCtx;
        this.canvas = canvas;
        this.ctx = ctx;

        
        // ref: https://stackoverflow.com/a/8306028/11651419
        function cloneCanvas(oldCanvas) {

        //create a new canvas
        var newCanvas = document.createElement('canvas');
        var context = newCanvas.getContext('2d');

        //set dimensions
        newCanvas.width = oldCanvas.width;
        newCanvas.height = oldCanvas.height;

        //apply the old canvas to the new one
        context.drawImage(oldCanvas, 0, 0);

        //return the new canvas
        return newCanvas;
        }

        // ref: https://stackoverflow.com/a/54555834/11651419
        const cropCanvas = (sourceCanvas, left, top, width, height) => {
        let destCanvas = document.createElement('canvas');
        destCanvas.width = width;
        destCanvas.height = height;
        destCanvas.getContext("2d").drawImage(
            sourceCanvas,
            left, top, width, height,  // source rect with content to crop
            0, 0, width, height);      // newCanvas, same size as source rect
        return destCanvas;
        };

        // ref: https://stackoverflow.com/a/52060802/11651419
        const loadImage = (url) => new Promise((resolve, reject) => {
        const img = new Image();
        img.addEventListener('load', () => resolve(img));
        img.addEventListener('error', (err) => reject(err));
        img.src = url;
        });

        // before unload
        $(window).bind('beforeunload', function () {
        if (!vm.syncStatus) {
            return 'Exit app without save data ?';
        }
        });

        if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/sw.js');
        }
    </script>


@endsection