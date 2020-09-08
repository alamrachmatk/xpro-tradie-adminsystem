<template>
    <div class="wrapper"> 
        <Header />
        <Sidebar />
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <router-view></router-view>
    </div>
        <Footer />
    <!-- /.content-wrapper -->

  </div>
</template>

<script>
    import Header from './components/layouts/Header.vue'; 
    import Sidebar from './components/layouts/Sidebar.vue';
    import Footer from './components/layouts/Footer.vue';
    export default {
        components: {
            Header,
            Sidebar,
            Footer
        }
    }
</script>