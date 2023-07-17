<template>
    <!-- Drawer -->
    <ui-drawer :type="isMobile ? 'modal' : 'dismissible'" nav-id="nav-menu" viewport-height>
        <ui-drawer-header v-show="current.code" v-shadow="headerShadow" style="z-index:1;padding-bottom:16px;">
            <canvas width="256" height="64" style="border: solid 1px black;margin-left:-18px;"
                id="canvas"></canvas>
            <ui-drawer-title>{{ current.name }}</ui-drawer-title>
            <ui-drawer-subtitle>
                <template v-for="(dest, i) in alternatesDests">
                    <span :class="(dest.code == current.code && current.alternates > 1) ? 'active' : ''">{{
                        dest.code }}</span>
                    <ui-icon class="align" v-if="current.alternates > 1 && i < alternatesDests.length - 1">
                        arrow_forward</ui-icon>
                </template>
            </ui-drawer-subtitle>
            <ui-switch input-id="toggle-autosave" v-tooltip="'toggle autosave'"
                aria-describedby="toggle autosave" v-model="autosave" @change="autosavePersist()"
                style="color: #fff;margin-top:12px;"></ui-switch>
            <label for="toggle-autosave" translate-fr="Sauvegarde auto">Autosave</label>
            <div v-if="multiplesDestWithSameName" class="disclaimer mt">
                <ui-icon translate="no">error</ui-icon>
                <p translate-fr="Plusieurs destinations ont le même code">2 or more dests have the same code</p>
            </div>
        </ui-drawer-header>
        <ui-drawer-content id="dest-container">
            <ui-nav>
                <ui-textfield style="width:95%;margin-left:8px;" input-type="search" v-model="searchDest"
                    id="search-dest">
                    Search
                    <template #before>
                        <ui-textfield-icon translate="no">search</ui-textfield-icon>
                    </template>
                </ui-textfield>
                <ui-nav-item href="javascript:void(0)" :draggable="dest.alternates != undefined"
                    ondragstart="vm.destDragStart(event);" ondragover="vm.destDropOver(event);"
                    ondrop="vm.destDropped(event);" ondragend="vm.destDropEnd(event);"
                    ondragleave="vm.destDropLeave(event);" @click="selectCurrent(index);writeUrl()"
                    :active="dest.name == current.name" v-for="(dest, index) in dests" :key="index"
                    :id="index + '-nav-item'" :data-drag="index" class="nav-item"
                    v-show="(dest.name.toLowerCase().includes(searchDest.toLowerCase()) || dest.code.toString().includes(searchDest)) && dest.code < 1000">
                    <ui-item-first-content style="margin-right:4px">
                        <ui-icon
                            v-bind:style="{ color: dest.line.back != '#ffffff' ? dest.line.back : '#bbbbbb' }">
                            flag</ui-icon>
                    </ui-item-first-content>
                    <ui-item-text-content>
                        <span style="width:24px;">{{dest.code}}</span>
                        <ui-icon class="align rotate">{{ dest.alternates > 1 ? 'call_split' : 'arrow_upward' }}
                        </ui-icon>
                        {{dest.name}}
                    </ui-item-text-content>
                    <ui-icon v-if="!ondrag" class="align draggable drag-icon-hide-class"
                        style="position:absolute;right:4px">drag_handle</ui-icon>
                </ui-nav-item>
                <hr>
                <ui-nav-item draggable="false" target="_blank"
                    :href="'https://github.com/arnoclr/matrix-maker/issues/new?body=' + encodeURIComponent('<!-- describe the problem encountered below -->\n\n<!-- Steps to reproduce the bug -->\n\n<!-- Please include a screenshot (photo or video) -->\n\n<!-- This string represent your actual dest, please don\'t remove it -->\n```json\n' + JSON.stringify(current) + '\n```')">
                    <ui-item-first-content>
                        <ui-icon translate="no">feedback</ui-icon>
                    </ui-item-first-content>
                    <ui-item-text-content translate-fr="Signaler un bug">Bug report</ui-item-text-content>
                </ui-nav-item>
                <ui-nav-item draggable="false" href="https://forms.gle/DcYYG9u63hQnE8e67" target="_blank">
                    <ui-item-first-content>
                        <ui-icon translate="no">cloud_upload</ui-icon>
                    </ui-item-first-content>
                    <ui-item-text-content translate-fr="Proposer des icônes">Submit icons</ui-item-text-content>
                </ui-nav-item>
                <ui-nav-item draggable="false" @click="openSettings" href="javascript:void(0)">
                    <ui-item-first-content>
                        <ui-icon translate="no">settings</ui-icon>
                    </ui-item-first-content>
                    <ui-item-text-content translate-fr="Paramètres">Settings</ui-item-text-content>
                </ui-nav-item>
                <div style="margin:16px;margin-bottom:120px;">
                    <small
                        translate-fr="Les codes de girouettes doivent être uniques, des bugs dans le jeu peuvent survenir sinon">matrix
                        codes must be unique, the hof will not work correctly otherwise.</small>
                </div>
            </ui-nav>
            <ui-icon-button v-tooltip="'Terms and attributions'" aria-describedby="details"
                style="position:absolute;bottom:72px;left:8px"
                @click="$balmUI.onOpen('licenceDialogOpen');writeUrl('licence')" icon="info"></ui-icon-button>
        </ui-drawer-content>
    </ui-drawer>
    <ui-drawer-backdrop v-if="isMobile"></ui-drawer-backdrop>
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