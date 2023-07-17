<template>
    <!-- dropzone -->
    <div id="dropzone" v-show="fileOnDrop" @dragover.prevent @dragleave="hofDragleave" @drop="hofDrop">
      <section class="empty-state">
        <ui-icon translate="no">backup</ui-icon>
        <p>{{ $t("Glissez déposez un fichier hof ou une archive au format json pour importer des girouettes") }}</p>
        <small>{{ $t("formats supportés") }}: .hof, .json</small>
      </section>
    </div>
  </template>
  <script>
  export default {
    data() {
      return {
        fileOnDrop: false,
      };
    },
    methods: {
      hofDragleave() {
        // implementation
      },
      hofDrop() {
        // implementation
      },
    },
  };
  </script> 
  <style>
  /* implementation specific styles */
  </style>