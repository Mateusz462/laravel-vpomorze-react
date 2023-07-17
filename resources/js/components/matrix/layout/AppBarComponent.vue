<template>
    <!-- App bar -->
    <ui-top-app-bar v-shadow="4" class="demo-app-bar" content-selector=".demo-app-content" nav-id="nav-menu">
        <span id="nav-title-text">Kpp Maker</span>
        <template #toolbar="{ toolbarItemClass }">
            <ui-icon-button @click="$balmUI.onOpen('statusDialogOpen');writeUrl('status')"
                v-tooltip="'show save status'" aria-describedby="save status"
                :icon="syncStatus ? 'done' : 'sync'"></ui-icon-button>
            <ui-icon-button :class="toolbarItemClass" v-tooltip="'Save all destinations in device storage'"
                aria-describedby="save in storage" icon="save" @click="saveDestsInLocalStorage()">
            </ui-icon-button>

            <div class="menu-content">
                <ui-icon-button :class="toolbarItemClass" icon="get_app"
                    @click="$balmUI.onOpen('downloadMenu')"></ui-icon-button>
                <ui-menu-anchor absolute>
                    <ui-menu @selected="onSelected" v-model="downloadMenu" :items="[
                        'Current matrix',
                        'Create hof with destinations',
                        'Export as json'
                    ]"></ui-menu>
                </ui-menu-anchor>
            </div>
        </template>
    </ui-top-app-bar>
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