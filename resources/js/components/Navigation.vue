<template>
    <div class="navigation">
        <table>
            <router-link to="/animals/list" tag="tr" class="selectable"><th>Animals</th></router-link>
            <router-link to="/cars/list" tag="tr" class="selectable"><th>Cars</th></router-link>
        </table>
    </div>
</template>

<script>
export default {
    
}
</script>