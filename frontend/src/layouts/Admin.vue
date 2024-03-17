<template>
    <div class="container">
        <header>
            <div>
                <!-- Admin Layout -->
                <div id="admin" v-if="$route.meta.layout === 'admin'">
                    <div class="wrapper">
                        <div class="sidebar">
                            <router-link to="/admin/AdminHome" class="sidebar-brand">Optic</router-link>
                            <ul class="nav flex-column sidebar-nav">
                                <li class="nav-item">
                                    <router-link to="/admin/glasses" class="nav-link">Glasses</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/brands" class="nav-link">Brands</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/types" class="nav-link">Types</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/admin/categories" class="nav-link">Categories</router-link>
                                </li>
                            </ul>
                        </div>
                        <!-- Main content -->
                        <div class="main-content">
                            <div class="container-fluid">
                                <RouterView />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Client Layout -->
                <div id="client" v-else>
                    <div>
                        <RouterView />
                    </div>
                </div>

            </div>
        </header>
    </div>
</template>

<style scoped>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width: 250px;
    background-color: rgb(40, 40, 40);
    padding-top: 56px;
}

.sidebar-brand {
    color: rgb(103, 172, 234);
    font-size: 1.5rem;
    font-weight: bold;
    padding: 15px 20px;
    display: block;
    text-decoration: none;
}

.sidebar-nav {
    padding-left: 20px;
}

.sidebar-nav .nav-link {
    color: #fff;
}

.main-content {
    margin-left: 120px;
    padding: 30px;
}
</style>