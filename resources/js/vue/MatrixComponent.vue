<template> 
    <!-- preloader -->
    <div id="preloader">
            <svg class="loader" width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <ellipse ry="25" rx="25" cy="30" cx="30" stroke-width="5" stroke="#607d8b" fill="none" />
                </g>
            </svg>
            <noscript>Javascript is disabled :(</noscript>
            <a href="https://github.com/arnoclr/matrix-maker/issues/new">not working ?</a>
        </div>

        <!-- hover preview matrix -->
        <div id="main-hover" style="display: none;"></div>

        <!-- dropzone -->
        <div id="dropzone" v-show="fileOnDrop" @dragover.prevent @dragleave="hofDragleave" @drop="hofDrop">
            <section class="empty-state">
                <ui-icon translate="no">backup</ui-icon>
                <p
                    translate-fr="Glissez déposez un fichier hof ou une archive au format json pour importer des girouettes">
                    Drop hof file or kpp maker archive to import existing destinations</p>
                <small><span translate-fr="formats supportés">supported formats</span> : .hof, .json</small>
            </section>
        </div>

        <!-- presentation dialog -->
        <ui-dialog v-model="presentationDialogOpen" mask-closable>
            <ui-dialog-content>
                <div class="slider">
                    <div class="slide" v-show="actualSlide == 0">
                        <img class="loading" loading="lazy" width="512" height="250"
                            src="https://i.imgur.com/szRCIZm.webp" alt="main interface">
                        <h1>Welcome</h1>
                        <p>Welcome to simple kpp maker. Make beautiful matrix for omsi 2 in few minutes, without
                            developer knowledge.</p>
                    </div>
                    <div class="slide" v-show="actualSlide == 1">
                        <img class="loading" loading="lazy" width="512" height="250"
                            src="https://i.imgur.com/guqnbeH.webp" alt="scrolling options">
                        <h1>Rich editor</h1>
                        <p>Use multiples fonts, create scrolling animations and add icons. Edit colors and more with
                            simple UI.</p>
                    </div>
                    <div class="slide" v-show="actualSlide == 2">
                        <img class="loading" loading="lazy" width="512" height="250"
                            src="https://i.imgur.com/o6GPmou.webp" alt="download modal">
                        <h1>Download</h1>
                        <p>Instant download your destinations and use it in OMSI2, without prior configuration.</p>
                    </div>
                    <ui-icon-button class="prev-btn" v-show="actualSlide != 0" @click="actualSlide-=1"
                        icon="arrow_backward"></ui-icon-button>
                    <ui-icon-button class="next-btn" v-show="actualSlide < 2" @click="actualSlide+=1"
                        icon="arrow_forward"></ui-icon-button>
                </div>
            </ui-dialog-content>
        </ui-dialog>

        <!-- changelog dialog -->
        <ui-dialog :open="changelogDialogOpen" @close="writeUrl();" mask-closable>
            <ui-dialog-title>New version {{ appData.version }}</ui-dialog-title>
            <ui-dialog-content>
                <p>Changelog of {{ appData.date }}</p>
                <div v-for="(categorie, name) in changelog" :key="name">
                    {{ name }}
                    <ul>
                        <li v-for="(line, index) in categorie" :key="index">{{ line }}</li>
                    </ul>
                </div>
            </ui-dialog-content>
            <ui-button style="display: none;"></ui-button>
        </ui-dialog>

        <!-- new dest dialog -->
        <ui-dialog v-model="newDialogOpen" @close="writeUrl();" mask-closable>
            <ui-dialog-title translate-fr="Ajouter une destination">Create new destination</ui-dialog-title>
            <ui-dialog-content style="width: 360px;">
                <p
                    translate-fr="Ce code est un identifiant pour selectionner les girouettes en jeu, l'indice de ligne présent sur la girouette peut être choisi indépendament.">
                    The code is an identifier used to select dests in game. The line index can be chosen separately.</p>
                <section>
                    <ui-textfield fullwidth v-model="addDestCode" helper-text-id="input-add-dest-helper"
                        input-type="number" min="0" max="999" maxlength="3" with-counter>
                        Code
                    </ui-textfield>
                    <ui-textfield-helper id="input-add-dest-helper" class="invalid"
                        v-show="dests.find(x => x.code === addDestCode)" visible>Code is already taken
                    </ui-textfield-helper>
                </section>
                <p></p>
                <ui-button :disabled="dests.find(x => x.code === addDestCode) || addDestCode == '' || addDestCode > 999"
                    @click="addDest(addDestCode);newDialogOpen = false" raised translate-fr="Créer">create</ui-button>
            </ui-dialog-content>
        </ui-dialog>

        <!-- share dialog -->
        <ui-dialog v-model="shareDialogOpen" @close="writeUrl();" mask-closable>
            <ui-dialog-title translate-fr="Partager cette girouette">Share current matrix</ui-dialog-title>
            <ui-dialog-content style="max-width:298px;">
                <img height="250" width="250" class="loading" :src="qrurl" alt="qr code">
                <hr>
                <p translate-fr="Ouvrez ce lien dans un autre navigateur pour importer cette girouette.">Open this link
                    in a new browser to import current matrix.</p>
                <ui-textfield outlined v-model="shurl" @focus="$event.target.select()"
                    style="width:100%;margin-bottom:16px;">
                    {{ current.name }} matrix link
                    <template #after>
                        <ui-textfield-icon title="Copy to clipboard" aria-describedby="clipboard copy"
                            @click.native="copyToClipboard(shurl)">content_copy</ui-textfield-icon>
                    </template>
                </ui-textfield>
                <ui-form-field v-if="shurl" v-show="!shurl.includes('bit.ly')">
                    <ui-checkbox onclick="app.reduceShareUrl();" input-id="checkbox-reduce-link" v-model="shurlcb">
                    </ui-checkbox>
                    <label for="checkbox-reduce-link" translate-fr="Générer un lien raccourci">Generate reduced
                        link</label>
                </ui-form-field>
            </ui-dialog-content>
            <ui-button style="display: none;"></ui-button>
        </ui-dialog>

        <!-- download hof dialog -->
        <ui-dialog v-model="downloadDialogOpen" @close="writeUrl()" mask-closable>
            <ui-dialog-content>
                <section class="illustration">
                    <ui-icon class="purple600">get_app</ui-icon>
                    <h4 translate-fr="Dernière étape">Last step</h4>
                    <p translate-fr="Choisissez un nom pour votre hof">Select a hof name file</p>
                    <img loading="lazy" height="363" width="335" src="./data/illustrations/package.png">
                </section>
                <ui-textfield outlined v-model="hofName">hof name</ui-textfield>
                <ui-button class="modal-float-right" @click="generateHof()" :disabled="hofName == ''"
                    translate-fr="Télécharger">Download</ui-button>
            </ui-dialog-content>
        </ui-dialog>

        <!-- download progress hof dialog -->
        <ui-dialog :open="downloadProgressDialogOpen">
            <ui-dialog-content>
                <p>Generation ...</p>
                <ui-spinner v-if="downloadProgressDialogOpen" :progress="(indexdl + 1) / dests.length"></ui-spinner>
            </ui-dialog-content>
            <ui-button style="display: none;"></ui-button>
        </ui-dialog>

        <!-- sync dialog -->
        <ui-dialog v-model="statusDialogOpen" @close="writeUrl()" mask-closable>
            <ui-dialog-title>
                <ui-icon style="margin-top:16px;" :size="36">{{ syncStatus ? 'done' : 'settings_backup_restore' }}
                </ui-icon>
            </ui-dialog-title>
            <ui-dialog-content style="max-width:300px;">
                <p v-show="syncStatus">Great ! All your dests are saved in this device. You can quit this website and
                    reopen later without loose your data.</p>
                <span v-show="!syncStatus">
                    <p>Caution ! Don't quit this website without save data, or you will loose your actual work.</p>
                    <ui-switch input-id="toggle-autosave-status-modal" v-tooltip="'toggle autosave'"
                        aria-describedby="toggle autosave" v-model="autosave" @change="autosavePersist()"></ui-switch>
                    <label for="toggle-autosave-status-modal">Autosave</label>
                    <br><small>We recommend that you enable automatic backup</small>
                </span>
            </ui-dialog-content>
            <ui-button style="display: none;"></ui-button>
        </ui-dialog>

        <!-- licence dialog -->
        <ui-dialog v-model="licenceDialogOpen" @close="writeUrl()" mask-closable>
            <ui-dialog-content>
                <ui-nav>
                    <ui-nav-item href="https://omsistuff.ga/?utm_source=kpp_maker&utm_medium=link&utm_campaign=beta">
                        <ui-item-first-content>
                            <ui-icon translate="no">palette</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Repaint library</ui-item-text-content>
                    </ui-nav-item>
                    <ui-nav-item href="https://github.com/arnoclr/matrix-maker">
                        <ui-item-first-content>
                            <ui-icon translate="no">
                                <svg width="24" height="24" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M 500 0C 500 0 500 0 500 0C 776 0 1000 224 1000 500C 1000 720 857 908 659 974C 634 979 625 963 625 950C 625 933 626 879 626 813C 626 766 610 736 592 720C 703 708 820 665 820 473C 820 418 801 374 769 339C 774 327 791 275 764 207C 764 207 722 193 626 258C 586 247 544 241 501 241C 459 241 416 247 376 258C 281 194 239 207 239 207C 211 275 229 327 234 339C 202 374 183 419 183 473C 183 665 299 708 410 720C 396 733 383 755 378 787C 349 800 278 821 233 746C 223 731 195 694 156 695C 114 695 139 718 156 728C 178 740 202 784 208 798C 218 826 250 880 376 857C 376 899 376 938 376 950C 376 963 367 978 342 974C 143 908 0 721 0 500C 0 224 224 0 500 0" />
                                </svg>
                            </ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Open source project</ui-item-text-content>
                    </ui-nav-item>
                    <ui-nav-item href="https://kpp.genav.ch/discord">
                        <ui-item-first-content>
                            <ui-icon translate="no">
                                <svg width="24" height="24" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d=" M 386 203C 387 203 388 203 388 203C 388 203 395 212 395 212C 267 248 209 304 209 304C 209 304 224 296 250 284C 326 250 386 241 411 239C 415 238 419 238 423 238C 466 232 515 231 566 236C 633 244 705 264 779 304C 779 304 723 251 603 214C 603 214 612 203 612 203C 612 203 709 201 811 277C 811 277 913 462 913 689C 913 689 853 792 697 797C 697 797 671 767 650 740C 743 714 778 656 778 656C 749 675 721 688 697 697C 661 712 627 722 594 728C 526 740 464 737 411 727C 371 719 336 708 307 697C 291 690 273 682 255 673C 253 671 251 670 249 669C 248 668 247 668 246 667C 233 660 226 655 226 655C 226 655 260 711 350 738C 329 765 303 797 303 797C 146 792 87 689 87 689C 87 462 189 277 189 277C 284 206 375 203 386 203C 386 203 386 203 386 203M 368 467C 327 467 296 502 296 545C 296 588 328 624 368 624C 408 624 440 588 440 545C 441 502 408 467 368 467C 368 467 368 467 368 467M 626 467C 586 467 554 502 554 545C 554 588 586 624 626 624C 666 624 698 588 698 545C 698 502 666 467 626 467C 626 467 626 467 626 467" />
                                </svg>
                            </ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Discord server</ui-item-text-content>
                    </ui-nav-item>
                    <ui-nav-item href="https://www.instagram.com/_genav/">
                        <ui-item-first-content>
                            <ui-icon translate="no">
                                <svg width="24" height="24" viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M 503 25C 631 25 647 26 697 28C 748 30 782 38 812 50C 843 62 870 78 896 105C 922 131 938 157 950 188C 962 218 970 253 972 303C 975 353 975 369 975 498C 975 626 975 642 972 693C 970 743 962 777 950 807C 938 838 922 865 896 891C 870 917 843 934 812 946C 782 957 748 965 698 968C 647 970 631 970 503 970C 374 970 358 970 308 968C 257 965 223 957 193 946C 162 934 136 917 109 891C 83 865 67 838 55 807C 43 777 35 743 33 693C 31 642 30 626 30 498C 30 369 31 353 33 303C 35 253 43 218 55 188C 67 157 83 131 109 105C 136 78 162 62 193 50C 223 38 258 30 308 28C 358 26 374 25 503 25C 503 25 503 25 503 25M 460 110C 372 110 355 111 312 113C 266 115 241 123 224 129C 202 138 186 148 170 165C 153 181 143 197 134 219C 128 236 120 261 118 307C 116 356 115 371 115 498C 115 624 116 639 118 689C 120 735 128 760 134 776C 143 798 153 814 170 831C 186 847 202 857 224 866C 241 872 266 880 312 882C 362 885 377 885 503 885C 629 885 644 885 694 882C 740 880 765 873 781 866C 804 857 819 847 836 831C 852 814 863 798 871 776C 878 760 885 735 887 689C 890 639 890 624 890 498C 890 372 890 357 887 307C 885 261 878 236 871 219C 863 197 852 181 836 165C 819 148 804 138 781 129C 765 123 740 115 694 113C 644 111 629 110 503 110C 487 110 473 110 460 110C 460 110 460 110 460 110M 755 189C 786 189 812 214 812 246C 812 277 786 302 755 302C 724 302 698 277 698 246C 698 214 724 189 755 189C 755 189 755 189 755 189M 503 255C 637 255 745 364 745 498C 745 632 637 740 503 740C 369 740 260 632 260 498C 260 364 369 255 503 255C 503 255 503 255 503 255M 345 498C 345 585 416 655 503 655C 590 655 660 585 660 498C 660 411 590 340 503 340C 416 340 345 411 345 498C 345 498 345 498 345 498" />
                                </svg>
                            </ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Instagram</ui-item-text-content>
                    </ui-nav-item>
                    <ui-divider>Attributions</ui-divider>
                    <ui-nav-item href="https://fonts.google.com/specimen/Poppins">
                        <ui-item-first-content>
                            <ui-icon translate="no">format_size</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Google fonts</ui-item-text-content>
                    </ui-nav-item>
                    <ui-nav-item href="http://www.freepik.com">
                        <ui-item-first-content>
                            <ui-icon translate="no">wallpaper</ui-icon>
                        </ui-item-first-content>
                        <ui-item-text-content>Designed by macrovector / Freepik</ui-item-text-content>
                    </ui-nav-item>
                </ui-nav>
                <div style="padding:8px">
                    <p translate-fr="Site dévellopé par Adam Mathieson et Arno Cellarier.">Site develloped by Adam
                        Mathieson and Arno Cellarier. Fonts copyright their respective owners</p>
                    <small>version {{ appData.version }} <a href="#!" @click="debugInfos">debug infos</a></small>
                </div>
            </ui-dialog-content>
            <ui-button style="display: none;"></ui-button>
        </ui-dialog>

        <div class="demo-container">
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
                            ondragstart="app.destDragStart(event);" ondragover="app.destDropOver(event);"
                            ondrop="app.destDropped(event);" ondragend="app.destDropEnd(event);"
                            ondragleave="app.destDropLeave(event);" @click="selectCurrent(index);writeUrl()"
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
            <!-- App content -->
            <ui-drawer-app-content class="demo-app-content" ondragover="app.hofDragover(event);">

                <ui-fab title="add dest" @click="$balmUI.onOpen('newDialogOpen');writeUrl('new')" icon="add"></ui-fab>

                <!-- hof data -->
                <section v-shadow="2" v-show="current.code" class="hof-data">
                    <ui-textfield outlined v-model="current.code" input-type="number" style="width:7rem;height:48px;"
                        v-show="!isMobile" disabled>code</ui-textfield>
                    <ui-textfield outlined v-model="current.name" style="height:48px;" id="res-tf-c-name" required>dest
                    </ui-textfield>
                    <ui-menu-anchor style="float: right;">
                        <ui-icon-button @click="$balmUI.onOpen('toolsMenuOpen')" icon="more_vert"></ui-icon-button>
                        <ui-menu v-model="toolsMenuOpen" @selected="onSelectedTools">
                            <ui-menuitem :disabled="current.code > 999">
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">share</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Partager la girouette">share current matrix
                                </ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon id="btn-spinning">refresh</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Rafraîchir le rendu">refresh render</ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">settings</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Paramètres de la girouette">current matrix settings
                                </ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">dashboard_customize</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Editer les icônes">edit icons</ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">animation</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text>{{ current.scroll ? 'scrolling settings' : 'add scrolling'}}
                                </ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">content_copy</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Dupliquer">duplicate current</ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem>
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">delete</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Supprimer">delete</ui-menuitem-text>
                            </ui-menuitem>
                            <ui-menuitem v-show="current.scroll">
                                <ui-menuitem-icon>
                                    <ui-icon translate="no">motion_photos_off</ui-icon>
                                </ui-menuitem-icon>
                                <ui-menuitem-text translate-fr="Rendu statique">non scroll preview</ui-menuitem-text>
                            </ui-menuitem>
                        </ui-menu>
                    </ui-menu-anchor>
                    <ui-icon-button title="play / pause scrolling preview" id="scrollButton" @click="scrollButton"
                        v-show="current.scroll" :class="isScrolling ? 'morphed' : ''"
                        style="float:right;margin:0px 4px;">
                        <i class="material-icons">play_arrow</i>
                        <i class="material-icons">pause</i>
                    </ui-icon-button>
                </section>

                <!-- adblock disclaimer -->
                <div id="adblock-banner" class="disclaimer" style="display: none; border-radius: 0px;">
                    <p
                        translate-fr="Vous utilisez un bloqueur de publicité, le site pourrait ne pas fonctionner comme attendu. Désactivez le si vous rencontrez des problèmes.">
                        You are using an ad blocker, the site may not work as expected. Disable it if you're encounter
                        problems.</p>
                </div>

                <!-- Edit current matrix section -->
                <section v-show="current.code" class="main-content">

                    <!-- dest settings dialog -->
                    <ui-dialog v-model="destSettingsDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>Settings for {{ current.code }}</ui-dialog-title>
                        <ui-dialog-content style="max-width: 350px;">
                            <p translate-fr="Editer le code">Edit dest code</p>
                            <ui-textfield outlined v-model="current.code" input-type="number" style="width:7rem;">code
                            </ui-textfield>
                            <div class="disclaimer mt">
                                <ui-icon translate="no">info</ui-icon>
                                <p
                                    translate-fr="Ne supprimez pas le code entierement. Aussi, le changement peut provoquer des bugs avec les girouettes alternantes.">
                                    Do not delete the code entirely. Also, edit code can cause bugs with alternating
                                    matrix.</p>
                            </div>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                    <!-- preview canvas -->
                    <div class="canvasBox">
                        <img width="1024" height="256" src="./data/overlayImage.png" id="overlayImage">
                        <div v-ripple @click="$balmUI.onOpen('lineDialogOpen');writeUrl('line')"
                            v-tooltip="'Line options'" aria-describedby="line" class="matrixOver" id="lineOver"
                            v-show="current.front.line"></div>
                        <div v-ripple @click="$balmUI.onOpen('lineDialogOpen');writeUrl('line')"
                            v-tooltip="'Line options'" aria-describedby="lineAlt" class="matrixOver" id="lineOverAlt"
                            v-show="!current.front.line"></div>
                        <div v-ripple @click="$balmUI.onOpen('frontDialogOpen');writeUrl('front')"
                            v-tooltip="'Front text options'" aria-describedby="front" class="matrixOver" id="frontOver"
                            v-show="current.front.line"></div>
                        <div v-ripple @click="$balmUI.onOpen('frontDialogOpen');writeUrl('front')"
                            v-tooltip="'Front text options'" aria-describedby="frontAlt" class="matrixOver"
                            id="frontOverAlt" v-show="!current.front.line"></div>
                        <div v-ripple @click="$balmUI.onOpen('sideDialogOpen');writeUrl('side')"
                            v-tooltip="'Side text options'" aria-describedby="side" class="matrixOver" id="sideOver">
                        </div>
                        <canvas width="1024" height="256" id="previewCanvas"></canvas>
                        <div class="alt-progress-hover" v-shadow="2">
                            <ui-spinner :progress="progressAltPreview" :size="'small'"></ui-spinner>
                            <span>{{ progressAltIndex }} / {{ alternatesDests.length }}</span>
                        </div>
                    </div>

                    <small
                        translate-fr="Vous pouvez éditer les différentes partie de la girouette en cliquant dessus.">You
                        can edit differents parts of the matrix by clicking on it.</small>

                    <!-- alternate -->
                    <hr>
                    <div style="position:relative">
                        <h4 style="margin-bottom:0" translate-fr="Girouettes alternantes">Alternating matrix</h4>
                        <p style="margin-top:0" translate-fr="Défile sur toutes les images avec un délai de 2 secondes">
                            loop over all frames with 2 seconds of delay</p>
                        <div class="btn-container" id="res-btn-ctn" style="position:absolute;top:0;right:0">
                            <ui-button icon="add" @click="addAlternate()" translate-fr="ajouter" outlined>add
                            </ui-button>
                            <ui-button icon="play_arrow" @click="previewAlternate();writeUrl('preview')"
                                :disabled="current.alternates < 2" translate-fr="prévisualisation">preview
                            </ui-button>
                        </div>
                    </div>
                    <ui-grid style="padding:0">
                        <template v-for="(dest, index) in alternatesDests">
                            <ui-grid-cell columns="3">
                                <a @click="selectCurrent(dest.index)" :href="'#' + dest.index"
                                    style="text-decoration: none;">
                                    <ui-card outlined>
                                        <ui-card-content
                                            :class="(current.code == dest.code) ? 'active-card-alt card-alt' : 'card-alt'">
                                            <h2 style="margin:0">{{ index }}<span style="color:grey;font-weight:400;"> -
                                                    {{ dest.code >= 1000 ? dest.code.toString().substr(1) : dest.code
                                                    }}</span></h2>
                                            <p class="truncate" style="margin:0">{{ dest.front.text }}</p>
                                        </ui-card-content>
                                    </ui-card>
                                </a>
                            </ui-grid-cell>
                        </template>
                    </ui-grid>

                    <!-- scrolling matrix -->
                    <ui-dialog v-model="scrollDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>
                            Scrolling options
                            <ui-button v-show="current.scroll" @click="removeScroll" class="dialog-header-btn"
                                icon="delete" translate-fr="Supprimer" unelevated>remove</ui-button>
                        </ui-dialog-title>
                        <ui-dialog-content>
                            <img width="4096" height="256" src="./data/overlayScroll.png" id="overlayScroll"
                                style="display: none;">
                            <!-- canvas used for writing / download -->
                            <canvas id="scrollTransmapCanvas" height="32" width="512" style="display: none;"></canvas>
                            <canvas id="scrollCanvas" height="32" width="512" style="display:none;"></canvas>
                            <canvas id="scrollPreviewCanvas" height="256" width="4096" style="display:none;"></canvas>
                            <div class="scroll-preview-box">
                                <canvas id="scrollPreviewCanvasOver" height="128" width="4096"></canvas>
                                <ui-icon-button title="ajust text height" @click="current.scroll.mt-=1;refreshMatrix()"
                                    id="scroll-up-btn" icon="keyboard_arrow_up"></ui-icon-button>
                                <ui-icon-button title="ajust text height" @click="current.scroll.mt+=1;refreshMatrix()"
                                    id="scroll-down-btn" icon="keyboard_arrow_down"></ui-icon-button>
                            </div>
                            <template v-if="current.scroll">
                                <p translate-fr="Options du texte">Text options.</p>
                                <ui-textfield outlined v-model="current.scroll.text"
                                    style="width:100%;margin-bottom:8px;">scroll text</ui-textfield>
                                <p translate-fr="Selectionnez les parties ou le texte va défiler">Select the sections
                                    where the text will scroll.</p>
                                <ui-select outlined v-model="current.scroll.font" :options="fontList"
                                    @change="loadFont(current.scroll.font)">font</ui-select>
                                <ui-form-field>
                                    <ui-checkbox @change="refreshMatrix" v-model="current.scroll.index"
                                        input-id="checkbox-scroll-front" value="11"></ui-checkbox>
                                    <label for="checkbox-scroll-front" translate-fr="avant">front</label>
                                </ui-form-field>
                                <ui-form-field>
                                    <ui-checkbox @change="refreshMatrix" v-model="current.scroll.index"
                                        input-id="checkbox-scroll-line" value="12"></ui-checkbox>
                                    <label for="checkbox-scroll-line" translate-fr="coté">side</label>
                                </ui-form-field>
                                <ui-form-field>
                                    <ui-checkbox @change="refreshMatrix" v-model="current.scroll.index"
                                        input-id="checkbox-scroll-side" value="13"></ui-checkbox>
                                    <label for="checkbox-scroll-side" translate-fr="ligne">line</label>
                                </ui-form-field>
                            </template>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                    <!-- Front text -->
                    <ui-dialog v-model="frontDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>
                            Front text options
                            <ui-button v-show="!current.scroll" @click="addScroll" class="dialog-header-btn" unelevated>
                                add scroll</ui-button>
                            <ui-button v-show="current.scroll" @click="removeScroll" class="dialog-header-btn"
                                unelevated>remove scroll</ui-button>
                        </ui-dialog-title>
                        <ui-dialog-content>
                            <template v-if="current.front.text">
                                <p>Font(s) selection.</p>
                                <ui-select outlined v-model="current.front.font" :options="fontList"
                                    @change="loadFont(current.front.font)" id="fontSelector">{{
                                    current.front.text.includes('\n') ? 'Top' : 'Main' }} font</ui-select>
                                <ui-select outlined v-model="current.front.fontb" :options="fontList"
                                    @change="loadFont(current.front.font)" id="fontSelector"
                                    v-show="current.front.text.includes('\n')">Bottom font</ui-select>
                            </template>
                            <hr>
                            <p>Skip a line to write on 2 levels, you can edit the fonts for each level individually.</p>
                            <div v-if="current.scroll" class="disclaimer">
                                <ui-icon translate="no">info</ui-icon>
                                <p>The current matrix is scrolling. Consider writing a classic version for
                                    non-compatible buses.</p>
                                <ui-button unelevated @click="refreshMatrix(false, false, true)">view compatibility
                                    rendering</ui-button>
                            </div>
                            <ui-textfield outlined maxlength="150" v-model="current.front.text" id="frontText"
                                input-type="textarea" rows="2" cols="40" @keyup="refreshMatrix(true, 'front')"
                                @change="refreshMatrix()">front text</ui-textfield>
                            <div class="mtb">
                                <div style="position:relative; display:inline-block">
                                    <ui-button unelevated type="button"
                                        v-bind:style="{ backgroundColor: current.front.color, color: pickerTextColor(current.front.color) }">
                                        front text color</ui-button>
                                    <input type="color" list="defaultColors" v-model="current.front.color"
                                        @change="refreshMatrix()"
                                        style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                                </div>
                                <ui-form-field>
                                    <ui-checkbox v-model="current.front.invert" input-id="checkbox-front-invert"
                                        @change="refreshMatrix()"></ui-checkbox>
                                    <label for="checkbox-front-invert">Invert colors</label>
                                </ui-form-field>
                            </div>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                    <!-- Line -->
                    <ui-dialog v-model="lineDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>Line options</ui-dialog-title>
                        <ui-dialog-content>
                            <section>
                                <p>Select line font. Fonts have differents size. Note that you can't edit size of a
                                    font.</p>
                                <ui-select outlined v-model="current.line.font" :options="fontList"
                                    @change="loadFont(current.line.font)" id="fontSelector"></ui-select>
                                <p>Line number (you can use letters and the text can be different of the hof code).</p>
                                <div v-if="current.scroll" class="disclaimer">
                                    <ui-icon translate="no">info</ui-icon>
                                    <p>The current matrix is scrolling. Consider writing a classic version for
                                        non-compatible buses.</p>
                                    <ui-button unelevated @click="refreshMatrix(false, false, true)">view compatibility
                                        rendering</ui-button>
                                </div>
                                <ui-textfield outlined v-model="current.line.text" @keyup="refreshMatrix(true, 'line')"
                                    @change="refreshMatrix()">front line number</ui-textfield>
                                <p></p>
                                <div style="position:relative; display:inline-block">
                                    <ui-button unelevated type="button"
                                        v-bind:style="{ backgroundColor: current.line.fore, color: pickerTextColor(current.line.fore) }">
                                        line color</ui-button>
                                    <input type="color" list="defaultColors" v-model="current.line.fore"
                                        @change="refreshMatrix()"
                                        style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                                </div>
                                <div style="position:relative; display:inline-block">
                                    <ui-button unelevated type="button"
                                        v-bind:style="{ backgroundColor: current.line.outl, color: pickerTextColor(current.line.outl) }">
                                        line outline</ui-button>
                                    <input type="color" list="defaultColors" v-model="current.line.outl"
                                        @change="refreshMatrix()"
                                        style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                                </div>
                                <div style="position:relative; display:inline-block">
                                    <ui-button unelevated type="button"
                                        v-bind:style="{ backgroundColor: current.line.back, color: pickerTextColor(current.line.back) }">
                                        line background</ui-button>
                                    <input type="color" list="defaultColors" v-model="current.line.back"
                                        @change="refreshMatrix()"
                                        style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                                </div>
                            </section>
                            <ui-form-field>
                                <ui-checkbox v-model="current.line.partial" input-id="checkbox-partial-line"
                                    @change="refreshMatrix()"></ui-checkbox>
                                <label for="checkbox-partial-line">Partial line background</label>
                            </ui-form-field>
                            <br>
                            <ui-form-field>
                                <ui-checkbox v-model="current.front.line" input-id="checkbox-show-line-front"
                                    @change="refreshMatrix()"></ui-checkbox>
                                <label for="checkbox-show-line-front">Show line on front</label>
                            </ui-form-field>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                    <!-- Side text -->
                    <ui-dialog v-model="sideDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>Side text options</ui-dialog-title>
                        <ui-dialog-content>
                            <template v-if="current.side.text">
                                <p>Font(s) selection.</p>
                                <ui-select outlined v-model="current.side.font" :options="fontList"
                                    @change="loadFont(current.side.font)" id="fontSelector">{{
                                    current.side.text.includes('\n') ? 'Top' : 'Main' }} font</ui-select>
                                <ui-select outlined v-model="current.side.fontb" :options="fontList"
                                    @change="loadFont(current.side.font)" id="fontSelector"
                                    v-show="current.side.text.includes('\n')">Bottom font</ui-select>
                            </template>
                            <p>Skip a line to write on 2 levels, you can edit the fonts for each level individually.</p>
                            <div v-if="current.scroll" class="disclaimer">
                                <ui-icon translate="no">info</ui-icon>
                                <p>The current matrix is scrolling. Consider writing a classic version for
                                    non-compatible buses.</p>
                                <ui-button unelevated @click="refreshMatrix(false, false, true)">view compatibility
                                    rendering</ui-button>
                            </div>
                            <ui-textfield outlined maxlength="150" v-model="current.side.text" id="frontText"
                                input-type="textarea" rows="2" cols="40" @keyup="refreshMatrix(true, 'side')"
                                @change="refreshMatrix()">front text</ui-textfield>
                            <div class="mtb">
                                <div style="position:relative; display:inline-block">
                                    <ui-button unelevated type="button"
                                        v-bind:style="{ backgroundColor: current.side.color, color: pickerTextColor(current.side.color) }">
                                        side text color</ui-button>
                                    <input type="color" list="defaultColors" v-model="current.side.color"
                                        @change="refreshMatrix()"
                                        style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                                </div>
                                <ui-form-field>
                                    <ui-checkbox v-model="current.side.invert" input-id="checkbox-side-invert"
                                        @change="refreshMatrix()"></ui-checkbox>
                                    <label for="checkbox-side-invert">Invert colors</label>
                                </ui-form-field>
                            </div>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                    <!-- icons options -->
                    <ui-dialog v-model="iconsDialogOpen" @close="writeUrl()" mask-closable>
                        <ui-dialog-title>Icon options</ui-dialog-title>
                        <ui-dialog-content>
                            <div style="position:relative; display:inline-block">
                                <ui-button unelevated type="button"
                                    v-bind:style="{ backgroundColor: current.front.iconHex, color: pickerTextColor(current.front.iconHex) }">
                                    Front icon color</ui-button>
                                <input type="color" list="defaultColors" v-model="current.front.iconHex"
                                    @change="refreshMatrix()"
                                    style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                            </div>
                            <div style="position:relative; display:inline-block">
                                <ui-button unelevated type="button"
                                    v-bind:style="{ backgroundColor: current.side.iconHex, color: pickerTextColor(current.side.iconHex) }">
                                    Side icon color</ui-button>
                                <input type="color" list="defaultColors" v-model="current.side.iconHex"
                                    @change="refreshMatrix()"
                                    style="opacity:0; position:absolute; left:0;top:0;width:100%" />
                            </div>
                            <p></p>
                            <ui-grid class="icon-select-grid">
                                <ui-grid-cell columns="6">
                                    <div class="relative">
                                        <ui-select outlined v-model="current.front.iconUrlL" :options="iconList"
                                            @change="refreshMatrix()" icon="add" with-leading-icon>Front left
                                        </ui-select>
                                        <img :src="current.front.iconUrlL" alt="">
                                    </div>
                                    <div class="relative">
                                        <ui-select outlined v-model="current.side.iconUrlL" :options="iconList"
                                            @change="refreshMatrix()" icon="add" with-leading-icon>Side left</ui-select>
                                        <img :src="current.side.iconUrlL" alt="">
                                    </div>
                                </ui-grid-cell>
                                <ui-grid-cell columns="6">
                                    <div class="relative">
                                        <ui-select outlined v-model="current.front.iconUrlR" :options="iconList"
                                            @change="refreshMatrix()" icon="add" with-leading-icon>Front right
                                        </ui-select>
                                        <img :src="current.front.iconUrlR" alt="">
                                    </div>
                                    <div class="relative">
                                        <ui-select outlined v-model="current.side.iconUrlR" :options="iconList"
                                            @change="refreshMatrix()" icon="add" with-leading-icon>Side right
                                        </ui-select>
                                        <img :src="current.side.iconUrlR" alt="">
                                    </div>
                                </ui-grid-cell>
                            </ui-grid>
                            <br>
                            <ui-collapse with-icon ripple>
                                <template #toggle>
                                    <div>Advanced options</div>
                                </template>
                                <div>
                                    <p style="margin-bottom:0;">Add customs icons.</p>
                                    <small>Must be black and white .png with 32px height and 29px width.</small>
                                    <br>
                                    <input type="file" id="frontIconInputL" @change="iconSubmitted">Front left
                                    icon
                                    <input type="file" id="frontIconInputR" @change="iconSubmitted">Front right
                                    icon
                                    <input type="file" id="sideIconInputL" @change="iconSubmitted">Side left
                                    icon
                                    <input type="file" id="sideIconInputR" @change="iconSubmitted">Side right
                                    icon
                                    <br><canvas id="iconLoader" width="32" height="32"
                                        style="width:32px;height:32px;"></canvas>
                                </div>
                            </ui-collapse>
                        </ui-dialog-content>
                        <ui-button style="display: none;"></ui-button>
                    </ui-dialog>

                </section>

                <!-- web app settings section-->
                <section v-show="settingsSectionOpen" id="settings">
                    <ui-top-app-bar content-selector=".settings-content" :nav-icon="false" v-shadow="4"
                        id="settings-tb">
                        <ui-icon-button icon="arrow_backward" @click="openSettings(false)"></ui-icon-button>
                        <span translate-fr="Paramètres">Settings</span>
                    </ui-top-app-bar>
                    <ui-list class="settings-content">
                        <ui-item disabled>
                            <ui-item-text-content translate-fr="Contraste élevé">High Contrast</ui-item-text-content>
                            <ui-item-last-content>
                                <ui-form-field>
                                    <ui-switch disabled onclick="app.saveSettings();" v-model="settings.highContrast">
                                    </ui-switch>
                                </ui-form-field>
                            </ui-item-last-content>
                        </ui-item>
                        <div style="margin: 16px">
                            <ui-select v-model="selectedLanguage" :options="settingsLanguages"
                                @selected="onLangSelect($event)">Language</ui-select>
                            <br><small
                                translate-fr="Le changement de langue n'affecte pas tout le site, certains boutons ou parties resteront en anglais.">Some
                                parts of site may not be translated.</small>
                        </div>
                        <ui-item>
                            <ui-button @click="resetLocalStorage" style="background-color: var(--mdc-theme-error);"
                                translate-fr="Formatter le stockage du site">reset local storage</ui-button>
                        </ui-item>
                    </ui-list>
                </section>

                <!-- Empty selection section -->
                <section v-show="!current.code" class="empty-state">
                    <ui-icon translate="no">touch_app</ui-icon>
                    <p
                        translate-fr="Commencez par selectionner une destination dans le panneau latéral ou créez-en une avec le bouton plus. Vous pouvez aussi glisser déposer des fichiers hof ou des sauvegardes pour importer plusieurs destinations en même temps.">
                        Start by select a destination or create it with plus button. You can also drag and drop hof and
                        backup files on the page.</p>
                </section>

            </ui-drawer-app-content>
        </div>
</template>

<script>
// first is main domain
const HOSTNAMES = ['kpp.genav.ch', 'beta-kpp.genav.ch', 'kpp.omsi-gpm.fr', 'beta-kpp.omsi-gpm.fr'];
const IS_BETA = true;

const iconList = [
    {
        label: '',
        value: 0,
    },
    {
        label: 'Aeroport',
        value: 'matrix_icons/aero.png'
    },
    {
        label: 'Gare',
        value: 'matrix_icons/gare.png'
    },
    {
        label: 'Hopital',
        value: 'matrix_icons/hopital.png'
    },
    {
        label: 'Metro',
        value: 'matrix_icons/m.png'
    },
    {
        label: 'Parking',
        value: 'matrix_icons/p.png'
    },
    {
        label: 'PR',
        value: 'matrix_icons/pr.png'
    },
    {
        label: 'RER',
        value: 'matrix_icons/rer.png'
    },
    {
        label: 'SCO',
        value: 'matrix_icons/sco.png'
    },
    {
        label: 'Tramway',
        value: 'matrix_icons/t.png'
    },
    {
        label: 'Mask (by Gg bus 49)',
        value: 'matrix_icons/mask_ggbus49.png'
    },
    // customs icons
    {
        label: 'custom left front', // -4
        value: null
    },
    {
        label: 'custom right front', // -3
        value: null
    },
    {
        label: 'custom left side', // -2
        value: null
    },
    {
        label: 'custom right side', // -1
        value: null
    }
];
    import { changelogParse } from './changelogParser';
    import { rrs } from './readable-random-string';
    import { settingsLanguages, translatePage } from './translate';
    import './style.css';
    

  export default {
    data() {
      return {
        previewCanvas: null,
        previewCtx: null,
        canvas: null,
        ctx: null,
        // pozostałe właściwości
        canvas: '',
        previewCanvas: '',
        ctx: '',
        previewCtx: '',
        iconCanvas: '',
        iconCtx: '',
        overlayImage: '',
        dests: [],
        alternatesDests: [],
        addDestCode: '',
        current: {
            front: {},
            line: {},
            side: {},
            scroll: {},
        },
        tinycurrent: {},
        fonts: {},
        fontList: [],
        iconList,
        downloadMenu: false,
        shareDialogOpen: false,
        newDialogOpen: false,
        frontDialogOpen: false,
        lineDialogOpen: false,
        sideDialogOpen: false,
        iconsDialogOpen: false,
        scrollDialogOpen: false,
        downloadDialogOpen: false,
        downloadProgressDialogOpen: false,
        destSettingsDialogOpen: false,
        statusDialogOpen: false,
        licenceDialogOpen: false,
        presentationDialogOpen: false,
        changelogDialogOpen: false,
        settingsSectionOpen: false,
        actualSlide: 0,
        toolsMenuOpen: false,
        shurl: null,
        shurlcb: false,
        qrurl: null,
        hofName: '',
        autosave: false,
        isScrolling: false,
        scrollingOffset: 0,
        searchDest: '',
        dragfrom: 0,
        dragto: 0,
        ondrag: false,
        indexdl: 0,
        rot: 0,
        multiplesDestWithSameName: false,
        headerShadow: 2,
        syncStatus: true,
        progressAltPreview: 0,
        progressAltIndex: 0,
        fileOnDrop: false,
        isMobile: window.matchMedia('only screen and (max-width: 618px)').matches,
        lastIndex: 0,
        settings: {
            highContrast: false,
        },
        changelog: null,
        appData: {
            version: '',
            date: ''
        },
        settingsLanguages,
        selectedLanguage: null
      };
    },
    created() {
        // const previewCanvas = document.getElementById("previewCanvas");
        // const previewCtx = previewCanvas.getContext('2d');
        // const canvas = document.getElementById("canvas");
        // const ctx = canvas.getContext('2d');

        // this.previewCanvas = previewCanvas;
        // this.previewCtx = previewCtx;
        // this.canvas = canvas;
        // this.ctx = ctx;
    },
    methods: {
        cloneCanvas(oldCanvas) {
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
        },

        cropCanvas(sourceCanvas, left, top, width, height) {
            let destCanvas = document.createElement('canvas');
            destCanvas.width = width;
            destCanvas.height = height;
            destCanvas.getContext("2d").drawImage(
            sourceCanvas,
            left, top, width, height,  // source rect with content to crop
            0, 0, width, height);      // newCanvas, same size as source rect
            return destCanvas;
        },

        async loadImage(url) {
            try {
            const img = await new Promise((resolve, reject) => {
                const image = new Image();
                image.addEventListener('load', () => resolve(image));
                image.addEventListener('error', (err) => reject(err));
                image.src = url;
            });
            return img;
            } catch (error) {
            console.error(error);
            throw new Error("Error loading image.");
            }
        },
        saveFile(name, type, data) {
            if (data != null && navigator.msSaveBlob)
            return navigator.msSaveBlob(new Blob([data], { type: type }), name);
            const a = $("<a style='display: none;'/>");
            const url = window.URL.createObjectURL(new Blob([data], { type: type }));
            a.attr("href", url);
            a.attr("download", name);
            $("body").append(a);
            a[0].click();
            window.URL.revokeObjectURL(url);
            a.remove();
        },
        isNumber(n) {
            return !isNaN(parseFloat(n)) && !isNaN(n - 0);
        },
        base64_url_encode(input) {
            return encodeURI(btoa(input));
        },
        base64_url_decode(input) {
            return atob(decodeURI(input));
        },
        // Matrix
        fillBitmapTextDraw: function (ctx, text, x, y, font, fillStyle) {
            if (localStorage[font]) {
                var curX = x;
                for (var i = 0; i < text.length; i++) {
                    var char = text.substr(i, 1);
                    var cData = [];
                    if (this.fonts[font][font][char] != null) {
                        cData = this.fonts[font][font][char];
                    } else {
                        cData = this.fonts[font][font][' '];
                        this.$toast("Character '" + char + "' Not Found in font: '" + font + "'!");
                    }
                    this.bitmapDrawCharacter(ctx, curX, y, cData, fillStyle);
                    curX = curX + cData.glyph[0].length + parseInt(this.fonts[font][font].charSpacing);
                }
            } else {
                this.$toast(font + ': is not usable');
                this.loadFont(font);
            }
        },
        bitmapDrawCharacter: function (ctx, curX, y, cData, fillStyle) {
            var offY = 0;
            cData.glyph.forEach((row) => {
                for (var i = 0; i < row.length; i++) {
                    var char = row.substr(i, 1);
                    if (char == "#") {
                        var fs = ctx.fillStyle;
                        ctx.fillStyle = fillStyle;
                        ctx.fillRect(curX + i, y + offY - cData.ascent, 1, 1);
                        ctx.fillStyle = fs;
                    }
                }
                offY++;
            });
        },
        bitmapTextDims: function (text, font) {
            if (localStorage[font]) {
                var width = 0;
                var height = 0;
                for (var i = 0; i < text.length; i++) {
                    var char = text.substr(i, 1);
                    var cData = [];
                    // load font
                    if (!this.fonts[font]) {
                        this.loadFont(font);
                    }
                    // if (char !== " ") {
                    if (this.fonts[font][font][char] == null || this.fonts[font][font][char].glyph.length == 0) {
                        cData = this.fonts[font][font][' '];
                        this.$toast("Character '" + char + "' Not Found in font: '" + font + "'!");
                    } else {
                        cData = this.fonts[font][font][char];
                    }
                    width = width + parseInt(cData.glyph[0].length) + parseInt(this.fonts[font][font].charSpacing);
                    if (height < cData.glyph.length) {
                        height = cData.glyph.length;
                    }
                }
                return {
                    "width": width,
                    "height": height
                };
            } else {
                return {
                    "width": 0,
                    "height": 0
                };
            }
        },
        drawIcon: async function (iconCode, matrix, showLine, invert = false, hex = '#ffffff') {
            if (!iconCode) {
                return null;
            }
            this.iconCtx.fillStyle = hex;
            this.iconCtx.fillRect(0, 0, 32, 32);
            var Xoff = 0;
            var Yoff = 0;
            switch (matrix) {
                case 0:
                    Xoff += 50;
                    break;
                case 1:
                    Xoff += 198;
                    break;
                case 2:
                    Xoff += 60;
                    Yoff += 32;
                    break;
                case 3:
                    Xoff += 198;
                    Yoff += 32;
                    break;
            }
            Xoff = (!showLine && matrix === 0) ? 0 : Xoff;
            this.iconCtx.width = 32;
            this.iconCtx.height = 32;
            this.iconCanvas.style.width = "32px";
            this.iconCanvas.style.height = "32px";
            this.iconCtx.fillStyle = '#000000';
            this.iconCtx.fillRect(0, 0, 32, 32);
            const img = await loadImage(iconCode);

            function drawIconPX(x, y, matrix, hex) {
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext('2d');
                ctx.fillStyle = hex;
                ctx.fillRect(x, y, 1, 1);
            }

            var iconCanvas = document.getElementById("iconLoader");
            var iconCtx = iconCanvas.getContext('2d');
            iconCtx.drawImage(img, 1, 1);
            for (var y = 0; y < 32; y++) {
                for (var x = 0; x < 32; x++) {
                    if ((iconCtx.getImageData(x, y, 1, 1).data)[0] > 128) {
                        drawIconPX(x + Xoff, y + Yoff, matrix, hex);
                    } else {
                        drawIconPX(x + Xoff, y + Yoff, matrix, '#000000');
                    }
                }
            }
        },

        // text margin
        // return margin top & bottom
        setMarginText: function (topDims, bottomDims) {
            var middle = 32 - topDims - bottomDims;
            var margin = Math.round((middle - 2) / 2);
            return (margin === 0) ? 1 : margin;
        },

        // front
        writeFrontText: function () {
            let frontBack, frontColor;
            if (this.current.front.invert) {
                frontBack = this.current.front.color;
                frontColor = '#000000';
            } else {
                frontBack = '#000000';
                frontColor = this.current.front.color;
            }
            this.ctx.fillStyle = frontBack;
            var tlx = (this.current.front.line) ? 50 : 0;
            var textWidth = (this.current.front.line) ? 140 : 115;
            // center text if L/R icon selected
            if (this.current.front.iconUrlL) {
                textWidth += 15;
            }
            if (this.current.front.iconUrlR) {
                textWidth -= 15;
            }
            this.ctx.fillRect(tlx, 0, 230, 32);
            // 1/2 lines
            if (this.current.front.text.includes('\n')) {
                var splitedText = this.current.front.text.split('\n');
                var dimsTop = this.bitmapTextDims(splitedText[0], this.current.front.font);
                var dimsBottom = this.bitmapTextDims(splitedText[1], this.current.front.fontb);
                let margin = this.setMarginText(dimsTop.height, dimsBottom.height);
                this.fillBitmapTextDraw(this.ctx, splitedText[0], Math.round(textWidth - (dimsTop.width / 2)), dimsTop.height + margin, this.current.front.font, frontColor, () => { });
                this.fillBitmapTextDraw(this.ctx, splitedText[1], Math.round(textWidth - (dimsBottom.width / 2)), 32 - margin, this.current.front.fontb, frontColor, () => { });
            } else {
                var dims = this.bitmapTextDims(this.current.front.text, this.current.front.font);
                this.fillBitmapTextDraw(this.ctx, this.current.front.text, Math.round(textWidth - (dims.width / 2)), Math.round(16 + (dims.height / 2)), this.current.front.font, frontColor, () => { });
            }
            this.renderCanvas(this.ctx, this.previewCtx);
        },

        // side
        writeSideText: function () {
            let sideBack, sideColor;
            if (this.current.side.invert) {
                sideBack = this.current.side.color;
                sideColor = '#000000';
            } else {
                sideBack = '#000000';
                sideColor = this.current.side.color;
            }
            this.ctx.fillStyle = sideBack;
            this.ctx.fillRect(60, 32, 170, 32);
            var textWidth = 145;
            // center text if L/R icon selected
            if (this.current.side.iconUrlL) {
                textWidth += 15;
            }
            if (this.current.side.iconUrlR) {
                textWidth -= 15;
            }
            // 1/2 lines
            if (this.current.side.text.includes('\n')) {
                var splitedText = this.current.side.text.split('\n');
                var dimsTop = this.bitmapTextDims(splitedText[0], this.current.side.font);
                var dimsBottom = this.bitmapTextDims(splitedText[1], this.current.side.fontb);
                let margin = this.setMarginText(dimsTop.height, dimsBottom.height);
                this.fillBitmapTextDraw(this.ctx, splitedText[0], Math.round(textWidth - (dimsTop.width / 2)), 32 + dimsTop.height + margin, this.current.side.font, sideColor, () => { });
                this.fillBitmapTextDraw(this.ctx, splitedText[1], Math.round(textWidth - (dimsBottom.width / 2)), 64 - margin, this.current.side.fontb, sideColor, () => { });
            } else {
                var dims = this.bitmapTextDims(this.current.side.text, this.current.side.font);
                this.fillBitmapTextDraw(this.ctx, this.current.side.text, Math.round(textWidth - (dims.width / 2)), Math.round(48 + (dims.height / 2)), this.current.side.font, sideColor, () => { });
                this.renderCanvas(this.ctx, this.previewCtx);
            }
        },

        cropScrollCanvas: function () {
            // remove black margin
            var heights = [];
            for (let y = 0; y <= 32; y++) {
                // TODO: stop at end of text
                for (let x = 0; x <= 512; x++) {
                    let color = this.scrollCtx.getImageData(x, y, 1, 1).data;
                    if (color[3] == 255) {
                        heights.push(y);
                        break;
                    }
                }
            }
            // keep transparent areas
            this.scrollPreviewCtx.clearRect(0, 0, 4096, heights[0] * 8);
            this.scrollPreviewCtx.clearRect(0, (heights[heights.length - 1] + 1) * 8, 4096, 256);

            // create transmap
            this.scrollTransmapCtx.fillStyle = '#ffffff';
            this.scrollTransmapCtx.fillRect(0, 0, 512, 32);
            this.scrollTransmapCtx.clearRect(0, 0, 512, heights[0]);
            this.scrollTransmapCtx.clearRect(0, (heights[heights.length - 1] + 1), 512, 32);
            if (!this.current.scroll.index.includes('13')) {
                this.scrollTransmapCtx.clearRect(0, 0, 50, 32);
            }
        },

        // scroll
        writeScrollText: function () {
            // clear canvas
            this.scrollCtx.clearRect(0, 0, 512, 32);
            this.scrollPreviewCtxOver.clearRect(0, 0, 4096, 128);
            this.scrollPreviewCtx.fillStyle = '#000000';
            this.scrollPreviewCtx.fillRect(0, 0, 4096, 256);
            // write
            let textColor = this.current.front.color;
            var dims = this.bitmapTextDims(this.current.scroll.text, this.current.scroll.font);
            this.fillBitmapTextDraw(this.scrollCtx, this.current.scroll.text, 0, parseInt(this.current.scroll.mt) + dims.height, this.current.scroll.font, textColor, () => { });
            // render big canvas
            this.scrollPreviewCtx.drawImage(this.scrollCanvas, 0, 0, 4096, 256);

            this.cropScrollCanvas();
            this.scrollPreviewCtxOver.drawImage(this.scrollPreviewCanvas, 0, 0, 2048, 128);
            this.scrollPreviewCtxOver.drawImage(this.scrollPreviewCanvas, 2048, 0, 2048, 128);
            setTimeout(() => {
                this.renderScroll();
            }, 250);
        },

        // line
        writeLineText: function () {
            // background
            // black
            this.ctx.fillStyle = '#000000';
            this.ctx.fillRect(0, 0, 50, 64);
            // color
            this.ctx.fillStyle = this.current.line.back;
            if (this.current.line.partial) {
                this.ctx.beginPath();
                this.ctx.moveTo(0, 0);
                this.ctx.lineTo(50, 0);
                this.ctx.lineTo(0, 32);
                this.ctx.lineTo(50, 32);
                this.ctx.lineTo(0, 64);
                this.ctx.fill();
                // remove anti-aliasing
                for (let x = 0; x <= 50; x++) {
                    for (let y = 0; y <= 64; y++) {
                        let color = this.ctx.getImageData(x, y, 1, 1).data;
                        if (color[0] == 0 && color[1] == 0 && color[2] == 0) {

                        } else {
                            this.ctx.fillRect(x, y, 1, 1);
                        }
                    }
                }
            } else {
                this.ctx.fillRect(0, 0, 50, 64);
            }
            var dims = this.bitmapTextDims(this.current.line.text, this.current.line.font);
            // outline
            var pxpy = [[24, 16], [25, 15], [26, 16], [25, 17], [24, 48], [25, 47], [26, 48], [25, 49]];
            for (let array of pxpy) {
                this.fillBitmapTextDraw(this.ctx, this.current.line.text, Math.round(array[0] - (dims.width / 2)), Math.round(array[1] + (dims.height / 2)), this.current.line.font, this.current.line.outl, () => { });
            }
            // text
            this.fillBitmapTextDraw(this.ctx, this.current.line.text, Math.round(25 - (dims.width / 2)), Math.round(16 + (dims.height / 2)), this.current.line.font, this.current.line.fore, () => { });
            this.fillBitmapTextDraw(this.ctx, this.current.line.text, Math.round(25 - (dims.width / 2)), Math.round(48 + (dims.height / 2)), this.current.line.font, this.current.line.fore, () => { });
        },

        // write icon at top and bottom
        writeIcon: async function () {
            if (this.current.front.iconUrlL) {
                await this.drawIcon(this.current.front.iconUrlL, 0, this.current.front.line, false, this.current.front.iconHex);
            }
            if (this.current.front.iconUrlR) {
                await this.drawIcon(this.current.front.iconUrlR, 1, this.current.front.line, false, this.current.front.iconHex);
            }
            if (this.current.side.iconUrlL) {
                await this.drawIcon(this.current.side.iconUrlL, 2, this.current.side.line, false, this.current.side.iconHex);
            }
            if (this.current.side.iconUrlR) {
                await this.drawIcon(this.current.side.iconUrlR, 3, this.current.side.line, false, this.current.side.iconHex);
            }
            return;
        },
        iconSubmitted: function (event) {
            var file = event.target.files[0];
            if (file.size < 300) {
                var reader = new FileReader();
                reader.readAsBinaryString(file);

                reader.onload = () => {
                    var base64icon = 'data:image/png;base64,' + btoa(reader.result);
                    if (event.target.id === 'frontIconInputL') {
                        iconList.splice(iconList.length - 4, 1, {
                            label: 'custom left front',
                            value: base64icon,
                        });
                        this.current.front.iconUrlL = base64icon;
                    } else if (event.target.id === 'frontIconInputR') {
                        iconList.splice(iconList.length - 3, 1, {
                            label: 'custom right front',
                            value: base64icon,
                        });
                        this.current.front.iconUrlR = base64icon;
                    } else if (event.target.id === 'sideIconInputL') {
                        iconList.splice(iconList.length - 2, 1, {
                            label: 'custom left side',
                            value: base64icon,
                        });
                        this.current.side.iconUrlL = base64icon;
                    } else if (event.target.id === 'sideIconInputR') {
                        iconList.splice(iconList.length - 1, 1, {
                            label: 'custom right side',
                            value: base64icon,
                        });
                        this.current.side.iconUrlR = base64icon;
                    }
                    this.refreshMatrix();
                };
                reader.onerror = function () {
                    app.$toast('error encountered while sending');
                };
            } else {
                this.$toast(`File too big (${file.size}), max size allowed : 300o`);
            }
        },
        // trigger when icons are loaded
        iconLoaded: function () {
            this.renderCanvas(this.ctx, this.previewCtx);
        },

        refreshMatrix: async function (textOnly = false, part = false, universalPreview = false) {
            if (!this.current) return;
            document.querySelector('#btn-spinning').style = 'transform: rotate(' + this.rot + 'deg)';
            this.rot += 360;
            switch (part) {
                case 'front':
                    this.writeFrontText();
                    break;
                case 'line':
                    this.writeLineText();
                    break;
                case 'side':
                    this.writeSideText();
                    break;
                default:
                    this.writeLineText();
                    this.writeFrontText();
                    this.writeSideText();
                    break;
            }
            if (!textOnly) {
                await this.writeIcon();
                if (this.current.scroll && !universalPreview) {
                    this.writeScrollText();
                }
                this.saveCurrentIntoDests();
                if (this.autosave) {
                    this.saveDestsInLocalStorage();
                }
                this.syncStatusRefresh();
            }
            this.drawRedPattern();
            this.renderCanvas(this.ctx, this.previewCtx);
            return;
        },
        refreshUi: function () {
            this.qrurl = '';
            this.headerShadow = (document.getElementById('dest-container').offsetHeight > window.innerHeight - 203) ? 2 : 0;
        },
        syncStatusRefresh: function () {
            if (localStorage.data == JSON.stringify(this.dests)) {
                this.syncStatus = true;
            } else {
                this.syncStatus = false;
            }
        },
        renderScroll: function () {
            if (this.isScrolling) {
                setTimeout(() => {
                    if (this.scrollingOffset <= 2048) {
                        this.scrollingOffset += 4;
                    } else {
                        this.scrollingOffset = 0;
                    }
                    // duplicate current preview
                    this.writeScrollTextOnPreview(this.scrollingOffset);
                    this.renderScroll();
                }, 10);
            } else {
                this.writeScrollTextOnPreview(0);
            }
        },
        writeScrollTextOnPreview: function (off) {
            // crop part of scrolling band and paste into sections of preview
            // 920x if line + front, 720x front only
            if (this.current.scroll.index.includes('11')) {
                let frontWidth = this.current.scroll.index.includes('13') ? 920 : 720;
                let frontScrollPos = cropCanvas(this.scrollPreviewCanvasOver, off, 0, frontWidth, 128);
                this.previewCtx.drawImage(frontScrollPos, 920 - frontWidth, 0);
            }
            // side
            if (this.current.scroll.index.includes('12')) {
                let sideWidth = this.current.scroll.index.includes('13') ? 920 : 680;
                let sideScrollPos = cropCanvas(this.scrollPreviewCanvasOver, off, 0, sideWidth, 128);
                this.previewCtx.drawImage(sideScrollPos, 920 - sideWidth, 128);
                this.previewCtx.fillStyle = "#800000";
                this.previewCtx.fillRect(200, 128, 40, 128);
            }
        },
        scrollButton: function () {
            if (this.isScrolling) {
                $('#scrollButton').addClass('morphed');
                this.isScrolling = false;
                this.refreshMatrix();
            } else {
                $('#scrollButton').removeClass('morphed');
                this.isScrolling = true;
                this.renderScroll();
            }
        },

        // utils
        exportAsJson: function () {
            saveFile(new Date().toISOString().slice(0, 10) + '-KPP-backup.json', 'text/json', JSON.stringify(this.dests));
        },
        renderCanvas: function (ctx, previewCtx) {
            previewCtx.drawImage(this.canvas, 0, 0, 1024, 256);
            // previewCtx.drawImage(overlayImage, 0, 0, 1024, 256);
        },
        drawRedPattern: function () {
            this.ctx.fillStyle = "#800000";
            this.ctx.fillRect(230, 0, 26, 64);
            this.ctx.fillRect(50, 32, 10, 32);
            import('jcanvas').then(moduleCanvas => {
                var JCanvas = moduleCanvas.default;
                JCanvas($, window);

                $('#canvas').drawText({
                    fillStyle: '#fff',
                    x: 220, y: 27,
                    fontSize: '7pt',
                    fontFamily: 'Verdana',
                    text: 'kpp.genav.ch',
                    fromCenter: false,
                    rotate: 90
                });
                // dest code
                if (this.current.code) {
                    $('#canvas').drawText({
                        fillStyle: '#fff',
                        x: 230, y: 52,
                        fontSize: '7pt',
                        fontFamily: 'Verdana',
                        text: this.current.code,
                        fromCenter: false,
                    });
                }
            });
        },
        downloadCanvas: function () {
            let downloadLink = document.createElement('a');
            var imgName = `kpp.genav.ch.${this.current.code}.${this.current.name}.png`;
            downloadLink.setAttribute('download', imgName);
            let canvas = document.querySelector('canvas');
            let dataURL = canvas.toDataURL('image/png');
            let url = dataURL.replace(/^data:image\/png/, 'data:application/octet-stream');
            downloadLink.setAttribute('href', url);
            downloadLink.click();
            this.$toast(`${imgName} downloaded`);
        },

        drawPX: function (previewCtx, color, x, y) {
            var c = hexToRgb(color);
            var r = c.r;
            var b = c.b;
            var g = c.g;
            if (r === 0 && g === 0 && b === 0) {
                r = g = b = 0.05 * 255;
            }
            previewCtx.fillStyle = 'rgb(' + r * 0.1 + ', ' + g * 0.1 + ', ' + b * 0.1 + ')';
            previewCtx.fillRect(x * 4, y * 4, 4, 4);
            previewCtx.fillStyle = 'rgb(' + r * 0.75 + ', ' + g * 0.75 + ', ' + b * 0.75 + ')';
            previewCtx.fillRect(x * 4 + 1, y * 4, 2, 4);
            previewCtx.fillRect(x * 4, y * 4 + 1, 4, 2);
            previewCtx.fillStyle = 'rgb(' + r + ', ' + g + ', ' + b + ')';
            previewCtx.fillRect(x * 4 + 1, y * 4 + 1, 2, 2);

        },
        rgbToHex: function (r, g, b) {
            return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
        },
        hexToRgb: function (hex) {
            var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
            return result ? {
                r: parseInt(result[1], 16),
                g: parseInt(result[2], 16),
                b: parseInt(result[3], 16)
            } : null;
        },
        resetLocalStorage: function () {
            this.$confirm('Reset app storage ? this action is irreversible').then(r => {
                if (r) {
                    window.localStorage.clear();
                    window.location.reload();
                };
            });
        },
        openSettings: function (open = true) {
            if (open) {
                this.writeUrl('settings');
                this.settingsSectionOpen = true;
            } else {
                this.writeUrl();
                this.settingsSectionOpen = false;
            }
        },
        saveSettings: function () {
            setTimeout(() => {
                let jsonSettings = JSON.stringify(this.settings);
                localStorage.setItem('settings', jsonSettings);
                this.$toast('Settings saved');
            }, 100);
        },

        // download menu
        onSelected(data) {
            switch (data.index) {
                case 0:
                    this.current.code ? this.downloadCanvas() : this.$toast('No matrix selected');
                    break;
                case 1:
                    app.downloadDialogOpen = true;
                    this.writeUrl('download');
                    break;
                case 2:
                    this.exportAsJson();
                    break;
            }
        },
        // tools menu
        onSelectedTools(data) {
            switch (data.index) {
                case 0:
                    this.shareCurrent();
                    break;
                case 1:
                    this.refreshMatrix();
                    break;
                case 2:
                    this.$balmUI.onOpen('destSettingsDialogOpen');
                    this.writeUrl('destSettings');
                    break;
                case 3:
                    this.$balmUI.onOpen('iconsDialogOpen');
                    this.writeUrl('icons');
                    break;
                case 4:
                    if (this.current.scroll) {
                        this.$balmUI.onOpen('scrollDialogOpen');
                        this.writeUrl('scroll');
                    } else {
                        this.addScroll();
                    }
                    break;
                case 5:
                    this.duplicateDest();
                    break;
                case 6:
                    this.deleteDest();
                    break;
                case 7:
                    this.refreshMatrix(false, false, true);
                    break;
            }
        },

        // ui
        onLangSelect: function (event) {
            if (!this.settingsSectionOpen) return;
            localStorage.setItem('lang', event.value);
            if (event.value == 'auto') {
                localStorage.removeItem('lang');
            }
            window.location.reload();
        },
        pickerTextColor: function (color) {
            if (color) {
                var r = parseInt(color.substr(1, 2), 16);
                var g = parseInt(color.substr(3, 2), 16);
                var b = parseInt(color.substr(4, 2), 16);
                var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
                // Return white if to dark, else return black
                return (yiq < 40) ? 'white' : 'black';
            } else {
                return 'black';
            }
        },
        debugInfos: function () {
            let txt = '';
            for (var a in localStorage) {
                txt = txt + a + ',';
            }
            this.$alert(txt);
        },
        previewAlternate: function () {
            $('#main-hover').fadeIn();
            $('.alt-progress-hover').fadeIn();
            $('.demo-app-bar').addClass('preview');
            $('.canvasBox').addClass('no-events');
            this.$toast('start of preview');
            this.alternatesDests.forEach((d, i) => {
                setTimeout(() => {
                    this.selectCurrent(d.index);
                    this.progressAltPreview = (i + 1) / this.alternatesDests.length;
                    this.progressAltIndex = i + 1;
                    console.log(this.alternatesDests.length, i);
                    if (this.alternatesDests.length - 1 == i) {
                        setTimeout(() => {
                            $('#main-hover').fadeOut();
                            $('.alt-progress-hover').fadeOut();
                            $('.demo-app-bar').removeClass('preview');
                            $('.canvasBox').removeClass('no-events');
                            this.$toast('end of preview');
                            this.selectCurrent(this.alternatesDests[0].index);
                        }, 2200);
                    }
                }, 2200 * i);
            });
        },
        writeUrl: function (segment = false) {
            let a = $('<a style="display:none"></a>');
            let href = (this.current ? (this.current.index == undefined ? '' : this.current.index) : '') + '/' + (segment ? segment : '');
            a.attr('href', '#' + href);
            $('body').append(a);
            a[0].click();
            a.remove();
        },
        anchorTrigger: function (string) {
            let modals = ['front', 'line', 'side', 'icons', 'destSettings', 'download', 'licence', 'status', 'scroll', 'new', 'changelog'];
            if (modals.includes(string)) {
                this.$balmUI.onOpen(string + 'DialogOpen');
            }
            switch (string) {
                case 'preview':
                    setTimeout(() => {
                        this.previewAlternate();
                    }, 1000);
                    break;
                case 'share':
                    setTimeout(() => {
                        this.shareCurrent();
                    }, 1000);
                    break;
                case 'settings':
                    setTimeout(() => {
                        this.openSettings();
                    }, 1000);
                    break;
            }
        },

        // hof importation
        // this.fileOnDrop = true;
        hofDragover: function (event) {
            event.preventDefault();
            this.fileOnDrop = true;
        },
        hofDragleave: function (event) {
            this.fileOnDrop = false;
        },
        hofDrop: function (event) {
            event.preventDefault();
            this.fileOnDrop = false;
            var file = event.dataTransfer.files[0],
                readerJson = new FileReader(),
                readerHof = new FileReader();
            // analyze and import json backup
            readerJson.onload = function (event) {
                app.dests = JSON.parse(event.target.result);
                app.$toast('Dests imported');
            };
            // open hof file
            readerHof.onload = function (event) {
                let hofDataText = event.target.result;
                let hofDestsText = hofDataText.split('[addterminus_list]').pop().split('[end]')[0];
                if (hofDestsText !== null) {
                    app.dests = [];
                    let hofDests = hofDestsText.split('\n');
                    hofDests.pop();
                    hofDests.forEach((dest, index) => {
                        group = dest.split(/	/);
                        line = group[1];
                        dest = (group[2] == null) ? 'undefined' : group[2];
                        text = (group[3] == null) ? 'undefined' : group[3];
                        if (isNumber(line)) {
                            app.addDest(line, dest, text, line, text);
                        }
                    });
                    app.$alert('hof import feature is not finished, it will be improved soon');
                } else {
                    app.$alert('this hof is not compatible');
                }
            };
            if (file.name.match(/(.+)(.json)/)) {
                this.$confirm('Import json data and delete actual destinations ?').then((r) => {
                    if (r) readerJson.readAsText(file);
                });
            } else if (file.name.match(/(.+)(.hof)/)) {
                this.$confirm('Import hof data and delete actual destinations ?').then((r) => {
                    if (r) readerHof.readAsText(file);
                });
            } else {
                this.$alert('Invalid file format');
            }
        },

        // drag and drop drawer
        destDragStart: function (event) {
            this.dragfrom = event.target.dataset.drag;
            this.ondrag = true;
        },
        destDropOver: function (event) {
            event.preventDefault();
            this.dragto = event.target.dataset.drag;
            $('.nav-item').removeClass('hover');
            $('#' + this.dragto + '-nav-item').addClass('hover');
        },
        destDropEnd: function (event) {
            this.ondrag = false;
            $('.nav-item').removeClass('hover');
        },
        destDropLeave: function (event) {
            $('.nav-item').removeClass('hover');
        },
        destDropped: function (event) {
            $('.nav-item').removeClass('hover');
            this.ondrag = false;
            this.dragto = event.target.dataset.drag;
            this.moveItem(this.dragfrom, this.dragto);
            this.refreshAlternates(this.dragto);
            this.selectCurrent(this.dragto);
            this.refreshAlternates(this.current.index - this.current.alternates);
        },

        addDestFocus: function () {
            $('#search-dest').focus();
        },

        moveItem: function (from, to) {
            console.log(from, to);
            if (to !== undefined) {
                this.dests.splice(to, 0, this.dests.splice(from, 1)[0]);
            }
        },
        refreshAlternates: function (id) {
            // loop over 10 alternates possibles codes
            id = parseInt(id); // dragto
            let dragfromcode = parseInt(this.dests[id].code);
            for (let index = 1; index <= 9; index++) {
                // loop over dests and find match
                let moved = false;
                this.dests.forEach((dest, i) => {
                    if (dest.code > 999 && dest.code == dragfromcode + 1000 * index) {
                        // if dragto is before or after actual dest
                        if (!moved) {
                            if (id > i) {
                                this.moveItem(i, id);
                                moved = true;
                            } else {
                                this.moveItem(i, id + index);
                                moved = true;
                            }
                        }
                    }
                });
            }
        },

        // dest logic
        addDest: function (code, name = '', front = '', line = '', side = '') {
            if (isNumber(code) && code > 0) {
                let destBuffer = {
                    code: code,
                    name: name,
                    front: {
                        font: 'luRS12',
                        fontb: 'luRS08',
                        text: (front !== '') ? front : 'FRONT',
                        line: true,
                        color: '#FF6A00',
                        iconHex: '#FF6A00',
                        iconUrlL: 0,
                        iconUrlR: 0,
                    },
                    line: {
                        font: 'luRS12',
                        text: (line !== '') ? line : code,
                        back: '#26c6da',
                        fore: '#FFFFFF',
                        outl: '#000000',
                    },
                    side: {
                        font: 'luRS12',
                        fontb: 'luRS08',
                        text: (side !== '') ? side : 'SIDE',
                        color: '#FF6A00',
                        iconHex: '#FF6A00',
                        iconUrlL: 0,
                        iconUrlR: 0,
                    },
                };
                this.dests.push(destBuffer);
                this.searchDest = '';
                this.$toast(code + ' added in dests');
                this.selectCurrent(this.dests.length - 1);
            } else {
                this.$toast('invalid code');
            }
        },
        addScroll: function () {
            var scroll = {
                font: 'luRS12',
                text: '',
                mt: 0,
                index: ['11'],
            };
            this.current = { ...this.current, scroll };
        },
        removeScroll: function () {
            this.$confirm('Remove scrolling matrix ?').then((r) => {
                if (r) delete this.current.scroll;
            });
        },
        addAlternate: function () {
            var lastAlt = this.alternatesDests.pop(),
                code = parseInt(lastAlt.code) + 1000;
            this.duplicateDest();
            this.dests[this.dests.length - 1].code = code;
            this.moveItem(this.dests.length - 1, parseInt(lastAlt.index) + 1);
            this.selectCurrent(parseInt(lastAlt.index) + 1);
        },
        deleteDest: function () {
            if (this.current.code) {
                this.$confirm(`Are you sure to delete ${this.current.code} ? (${this.current.index})`).then((r) => {
                    if (r) {
                        this.dests.splice(this.current.index, 1);
                        this.$toast(this.current.code + ' deleted from dests');
                        if (this.current.index >= 0) {
                            this.selectCurrent(this.current.index - 1);
                        }
                    }
                });
            } else {
                this.$toast('No selected destination to delete');
            }
        },
        duplicateDest: function () {
            let currentBuffer = JSON.parse(JSON.stringify(this.current));
            currentBuffer.code = parseInt(currentBuffer.code) + 1;
            this.dests.push(currentBuffer);
            this.$toast(`${this.current.code} duplicated`);
        },
        selectCurrent: async function (index) {
            this.isScrolling = false;
            if (this.dests[index] == undefined) {
                return this.$alert(`Destination n°${index} don't exist`);
            }
            this.current = this.dests[index];
            this.alternatesDests = [];
            var codes = [];
            if (this.current.code == undefined) {
                this.current.code = prompt('please enter a new code');
            }
            this.dests.forEach((dest, arrayIndex) => {
                if (dest != undefined && parseInt(dest.code) == parseInt(app.current.code) + 1000 * (arrayIndex - index)) {
                    app.dests[arrayIndex].index = arrayIndex;
                    app.alternatesDests.push(app.dests[arrayIndex]);
                }
                codes.push(dest.code);
            });
            this.multiplesDestWithSameName = codes.some((val, i) => codes.indexOf(val) !== i);
            this.dests[index].alternates = this.alternatesDests.length;
            // import icon base64 value in select if custom icon detected
            if (this.current.front.iconUrlL) {
                if (this.current.front.iconUrlL.match(/data:image+/)) {
                    iconList.splice(iconList.length - 4, 1, {
                        label: 'custom left front',
                        value: this.current.front.iconUrlL,
                    });
                }
            }
            if (this.current.front.iconUrlR) {
                if (this.current.front.iconUrlR.match(/data:image+/)) {
                    iconList.splice(iconList.length - 3, 1, {
                        label: 'custom right front',
                        value: this.current.front.iconUrlR,
                    });
                }
            }
            if (this.current.side.iconUrlL) {
                if (this.current.side.iconUrlL.match(/data:image+/)) {
                    iconList.splice(iconList.length - 2, 1, {
                        label: 'custom left side',
                        value: this.current.side.iconUrlL,
                    });
                }
            }
            if (this.current.side.iconUrlR) {
                if (this.current.side.iconUrlR.match(/data:image+/)) {
                    iconList.splice(iconList.length - 1, 1, {
                        label: 'custom right side',
                        value: this.current.side.iconUrlR,
                    });
                }
            }
            this.current.index = index;
            if (this.current.front.color == null) {
                this.current.front.color = '#FF4400';
            }
            await this.refreshMatrix();
            this.refreshUi();
            document.title = this.current.code + ' → ' + this.current.name;
            this.$theme.secondary = (this.current.line.back) ? (this.current.line.back != '#ffffff' ? this.current.line.back : '#bbbbbb') : '#26c6da';
            return;
        },
        saveCurrentIntoDests: function () {
            this.dests.splice(this.current.index, 1, this.current);
        },
        saveDestsInLocalStorage: function () {
            this.saveCurrentIntoDests();
            localStorage.data = JSON.stringify(this.dests);
            this.syncStatusRefresh();
            this.$toast('Destinations saved in localStorage');
        },
        loadFont: function (font) {
            if (font) {
                if (!localStorage[font]) {
                    fetch('./bitmapFonts/' + font + '.json')
                        .then((response) => {
                            if (response.ok) {
                                return response.json();
                            } else {
                                this.$toast(`(${font}) error: ${response.status}`);
                            }
                        })
                        .then((json) => {
                            localStorage[font] = JSON.stringify(json);
                            this.pushFont(font);
                        });
                } else {
                    this.pushFont(font);
                }
            } else {
                this.$toast('empty font requested');
            }
        },
        pushFont: function (font) {
            let json = localStorage[font];
            if (json == undefined || json == 'undefined') return;
            this.fonts[font] = JSON.parse(json);
            this.refreshMatrix();
            this.$toast(font + ' loaded');
        },
        shareCurrent: function () {
            // this.tinycurrent.a = this.current.code;
            // this.tinycurrent.b = this.current.name;
            let domain;
            if (HOSTNAMES.includes(window.location.hostname)) {
                domain = window.location.hostname;
            } else {
                domain = IS_BETA ? HOSTNAMES[1] : HOSTNAMES[0];
            }
            this.shurl = 'https://' + domain + '/?s=' + base64_url_encode(JSON.stringify(this.current));
            this.$balmUI.onOpen('shareDialogOpen');
            this.writeShareUrl();
            this.writeUrl('share');
        },
        reduceShareUrl: function () {
            let long_url = this.shurl;
            fetch('https://kpp.omsi-g.pm/new?name=KPP&key=KppKey&url=' + long_url)
                .then((response) => response.json())
                //Then with the data from the response in JSON...
                .then((data) => {
                    if (data.Status != 200) {
                        this.$toast(data.Message);
                        this.shurl = long_url;
                        this.writeShareUrl();
                    } else {
                        this.shurl = data.shortURL;
                        this.writeShareUrl();
                    }
                })
                //Then with the error genereted...
                .catch((error) => {
                    console.log(error);
                    this.$toast(error);
                    this.shurl = long_url;
                    this.writeShareUrl();
                });
        },
        writeShareUrl: function () {
            this.shurlcb = false;
            this.qrurl = 'https://api.qrserver.com/v1/create-qr-code/?data=' + this.shurl;
        },
        autosavePersist: function () {
            if (this.autosave) {
                localStorage.autosave = this.autosave;
            } else {
                localStorage.removeItem('autosave');
            }
        },

        // generate hof
        generateHof: function () {
            window.selected = app.current.index;
            app.downloadDialogOpen = false;
            app.downloadProgressDialogOpen = true;
            if (!this.hofName) {
                return this.$toast('Name is empty');
            }
            var hofName = this.hofName;
            var folderName = "KPPMaker-" + this.uuidv4();
            // lazy load ascii-table and JSZip modules
            Promise.all([import('jszip'), import('ascii-table')]).then(async ([moduleZip, moduleTable]) => {
                let JSZip = moduleZip.default;
                var zip = new JSZip();

                let AsciiTable = moduleTable.default;
                var codeBook = new AsciiTable('DESTINATION CODES');

                zip.file(folderName + ".hof", this.generateHOF2(folderName, hofName));

                var vehicles = zip.folder("vehicles");
                var Anzeigen = vehicles.folder("Anzeigen");
                var Krueger = Anzeigen.folder("Krueger");
                var f230x32 = Krueger.folder("230x32");
                var img = f230x32.folder(folderName);
                var scrollMatrix = f230x32.folder('scrollMatrix');
                var scrollImg = scrollMatrix.folder(folderName);
                codeBook.setHeading("CODE", "NAME", "LINE TEXT", "FRONT TEXT", "SIDE TEXT");
                for (let dest in this.dests) {
                    // noinspection JSUnfilteredForInLoop
                    codeBook.addRow(this.dests[dest].code, this.dests[dest].name, this.dests[dest].line.text, this.dests[dest].front.text.replace(/\n+/g, '↵'), this.dests[dest].side.text.replace(/\n+/g, '↵'));
                }
                this.indexdl = 0;
                this.selectCurrentForZip(img, scrollImg, zip, hofName);
                zip.file("codebook.txt", codeBook.toString());
            });
        },
        selectCurrentForZip: async function (img, scrollImg, zip, hofName) {
            if (this.indexdl < this.dests.length) {
                await this.selectCurrent(this.indexdl);
                app.indexdl++;
                img.file(app.dests[app.indexdl - 1].code + ".png", $("#canvas").getCanvasImage().substr(22), { base64: true });
                if (app.current.scroll) {
                    // draw scroll overlay at export time
                    this.scrollPreviewCtx.drawImage(this.overlayScroll, 0, 0, 4096, 256);
                    this.cropScrollCanvas();
                    scrollImg.file(app.dests[app.indexdl - 1].code + ".png", $("#scrollPreviewCanvas").getCanvasImage().substr(22), { base64: true });
                    scrollImg.file(app.dests[app.indexdl - 1].code + ".transmap.png", $("#scrollTransmapCanvas").getCanvasImage().substr(22), { base64: true });
                }
                app.selectCurrentForZip(img, scrollImg, zip, hofName);
            } else {
                zip.generateAsync({ type: "blob" }).then(function (content) {
                    saveFile(`${hofName}-kpp.genav.ch.zip`, "application/zip", content);
                    app.downloadProgressDialogOpen = false;
                    app.$toast(`${hofName}-kpp.genav.ch.zip has been downloaded`);
                    app.selectCurrent(window.selected);
                });
            }
        },
        uuidv4: function () {
            return rrs(4) + Math.floor(Math.random() * 90 + 10);
        },
        generateHOF2: function (dir, name) {
            var terminus_list = "";
            for (var dest in this.dests) {
                // noinspection JSUnfilteredForInLoop
                terminus_list += "\t" + this.dests[dest].code +
                    "\t" + (this.dests[dest].name !== "" ? this.dests[dest].name : "NO NAME") +
                    "\t" + (this.dests[dest].name !== "" ? this.dests[dest].name : "NO NAME") +
                    "\t" + this.dests[dest].front.text.replace(/\n+/g, '-') +
                    "\t\t" + this.dests[dest].side.text.replace(/\n+/g, '-') +
                    "\t\t" + this.dests[dest].name +
                    "\t\t" + dir + "\\" + this.dests[dest].code + ".png";
                // add scroll index
                if (this.dests[dest].scroll) {
                    const sFront = this.dests[dest].scroll.index.includes('11');
                    const sSide = this.dests[dest].scroll.index.includes('12');
                    const sLine = this.dests[dest].scroll.index.includes('13');
                    terminus_list += "\t\t\t" +
                        "\t" + (sFront ? dir + "\\" + this.dests[dest].code + ".png" : "") +
                        "\t" + (sSide ? dir + "\\" + this.dests[dest].code + ".png" : "") +
                        "\t" + (sLine ? dir + "\\" + this.dests[dest].code + ".png" : "") +
                        "\t" +
                        (sLine ? "\t\t" : dir + "\\" + this.dests[dest].code + ".transmap.png\t") +
                        "\t\t\t\t\t\t\t";
                } else {
                    terminus_list += "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                terminus_list += "\r\n";
            }
            var rtn = "HOF AND IMAGES GENERATED WITH SIMPLE OMSI K++ MAKER\r\n" +
                "https://kpp.genav.ch/\r\n" +
                "\r\n" +
                "[name]\r\n" +
                name + "\r\n" +
                "\r\n" +
                "[servicetrip]\r\n" +
                (this.dests[Object.keys(this.dests)[0]].name !== "" ? this.dests[Object.keys(this.dests)[0]].name : "NO NAME") + "\r\n" +
                "\r\n" +
                "[global_strings]\r\n" +
                "6\r\n" +
                name + "\r\n" +
                name + "\r\n" +
                name + "\r\n" +
                "\r\n" +
                "\r\n" +
                "\r\n" +
                "\r\n" +
                "stringcount_terminus\r\n" +
                "26\n" +
                "\r\n" +
                "stringcount_busstop\r\n" +
                "9\n" +
                "\r\n" +
                "\r\n" +
                "[addterminus_list]\r\n" +
                terminus_list +
                "[end]\r\n" +
                "\r\n" +
                "\r\n" +
                "[addbusstop_list]\r\n" +
                "STOP List\t\t\t\t\t\t\t\t\r\n" +
                "[end]\r\n" +
                "\n###########\t  ###########\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n###########   B   ###########\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n###########  \t  ###########\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n[infosystem_trip]\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n199\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\nBetriebsfahrt  >>  Betriebsfahrt\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n99\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\nB\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n................\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n[infosystem_busstop_list]\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n2\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\nBetriebsfahrt\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\nBetriebsfahrt\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\n";
            return this.downloadUtf16(rtn);
        },
        downloadUtf16: function (str) {

            // ref: https://stackoverflow.com/q/6226189
            var charCode, byteArray = [];
            byteArray.push(255, 254);

            for (var i = 0; i < str.length; ++i) {
                charCode = str.charCodeAt(i);
                byteArray.push(charCode & 0xff);
                byteArray.push(charCode / 256 >>> 0);
            }

            return new Blob([new Uint8Array(byteArray)], { type: 'text/plain;charset=UCS-2LE;' });
        },
        copyToClipboard: function (text) {
            const elem = document.createElement('textarea');
            elem.value = text;
            document.body.appendChild(elem);
            elem.select();
            document.execCommand('copy');
            document.body.removeChild(elem);
            this.$toast('text copied to clipboard');
        }
    },
    async mounted() {
        // grey / cyan theme
        this.$theme.primary = '#607d8b';
        this.$theme.secondary = '#26c6da';

        // autosave init
        if (localStorage.autosave) {
            this.autosave = localStorage.autosave;
        }

        // init data
        // with local storage or url share parameter
        var url_string = window.location.href;
        var url = new URL(url_string);
        var s = (url.searchParams.get("share") || url.searchParams.get("s"));
        if (localStorage.data) {
            this.dests = JSON.parse(localStorage.data);
            // retro compatibility for data of v1.x
            if (this.dests.constructor === ({}).constructor) {
                this.$toast('Old data detected, some options will be missing');
                var arrayBuffer = [];
                for (var i in this.dests) { // noinspection JSUnfilteredForInLoop
                    arrayBuffer.push(this.dests[i]);
                }
                this.dests = arrayBuffer;
            }
        }
        if (s) {
            let jsonImport = JSON.parse(base64_url_decode(s));
            this.dests.push(jsonImport);
            this.$toast(`${jsonImport.code} → ${jsonImport.name} imported`);
            history.pushState("", document.title, window.location.pathname);
        }

        if (localStorage.settings) this.settings = JSON.parse(localStorage.settings);

        // define canvas
        this.canvas = document.getElementById("canvas");
        this.previewCanvas = document.getElementById("previewCanvas");
        this.scrollCanvas = document.getElementById("scrollCanvas");
        this.scrollPreviewCanvas = document.getElementById("scrollPreviewCanvas");
        this.scrollPreviewCanvasOver = document.getElementById("scrollPreviewCanvasOver");
        this.scrollTransmapCanvas = document.getElementById("scrollTransmapCanvas");
        this.iconCanvas = document.getElementById("iconLoader");

        // contexts
        this.ctx = this.canvas.getContext('2d');
        this.previewCtx = this.previewCanvas.getContext('2d');
        this.scrollCtx = this.scrollCanvas.getContext('2d');
        this.iconCtx = this.iconCanvas.getContext('2d');
        this.scrollPreviewCtx = this.scrollPreviewCanvas.getContext('2d');
        this.scrollPreviewCtxOver = this.scrollPreviewCanvasOver.getContext('2d');
        this.scrollTransmapCtx = this.scrollTransmapCanvas.getContext('2d');

        // overlays
        this.overlayImage = document.getElementById('overlayImage');
        this.overlayScroll = document.getElementById('overlayScroll');

        this.previewCtx.imageSmoothingEnabled = false;
        this.scrollPreviewCtx.imageSmoothingEnabled = false;
        this.scrollPreviewCtxOver.imageSmoothingEnabled = false;
        this.ctx.fillBitmapTextDraw = this.fillBitmapTextDraw;
        this.ctx.bitmapTextDims = this.bitmapTextDims;

        $.get('/data/fonts.json', (data) => {
            app.fontList = data;
        });

        $(window).bind('load', () => {
            // detect if matrix is selected in link
            if (location.href.indexOf("#") != -1) {
                let anchor = location.href.split('#').pop().split('/');
                let id = anchor[0];
                if (id) {
                    setTimeout(() => {
                        this.selectCurrent(id);
                    }, 250);
                }
                if (anchor[1] != undefined) {
                    let action = anchor[1].split('?').shift();
                    this.anchorTrigger(action);
                }
            }
            if (window.matchMedia('only screen and (min-width: 1200px)').matches) {
                $('#nav-menu').click();
            }
            translatePage();
            $('#preloader').fadeOut();
        });

        // presentation modal
        if (localStorage.presentation == null) {
            this.$balmUI.onOpen('presentationDialogOpen');
            localStorage.presentation = true;
        }

        // changelog
        changelogParse('changelog.md').then(changelog => {
            let latestClient = localStorage.getItem('changelog');
            app.appData.version = changelog.latest;
            app.appData.date = changelog.date;
            app.changelog = changelog[changelog.latest];
            if (latestClient != changelog.latest) {
                localStorage.setItem('changelog', changelog.latest);
                app.writeUrl('changelog');
                app.changelogDialogOpen = true;
            }
        });

        //listen for window resize event
        window.addEventListener('resize', function (event) {
            app.isMobile = window.matchMedia('only screen and (max-width: 618px)').matches;
        });

        // disclaimers
        if (IS_BETA) {
            $('#nav-title-text').text('Kpp Maker - Beta');
            this.$alert('This is a beta version of the site, which may contain bugs. Please report any malfunctions you encounter.');
        }

        // detect adblock
        const googleAdUrl = "https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js";
        const googleAdRequest = await fetch(googleAdUrl, {
            method: 'HEAD',
        });

        if (googleAdRequest.status !== 200 || googleAdRequest.redirected) {
            document.getElementById('adblock-banner').style.display = 'block';
        }
    }
  }

</script>