<template>
    <span>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-if="!isAuth">
            <li class="nav-item">
                <router-link to="/login" class="nav-link fs-5"
                    >Login</router-link
                >
            </li>
            <li class="nav-item">
                <router-link to="/register" class="nav-link fs-5"
                    >Register</router-link
                >
            </li>
        </ul>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0" v-else>
            <li class="nav-item">
                <router-link
                    to="/cart"
                    class="nav-link nav-icon position-relative fs-5"
                >
                    <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                    <span
                        class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"
                        >{{getAllCarts.length}}</span
                    >
                </router-link>
            </li>
            <li class="nav-item dropdown">
                <a
                    class="nav-link dropdown-toggle fs-5"
                    href="#"
                    id="navbarDarkDropdownMenuLink"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                >
                    <i class="fa-solid fa-user"></i>
                </a>
                <ul
                    class="dropdown-menu dropdown-menu-light"
                    aria-labelledby="navbarDarkDropdownMenuLink"
                >
                    <li>
                        <router-link to="/logout" class="dropdown-item fs-5"
                            ><i class="fa-solid fa-right-from-bracket"></i>
                            Logout</router-link
                        >
                    </li>
                    <li>
                        <router-link to="/setting" class="dropdown-item fs-5"
                            ><i class="fa-solid fa-gear"></i>
                            Setting</router-link
                        >
                    </li>
                </ul>
            </li>
        </ul>
    </span>
</template>

<script>
import { mapGetters } from 'vuex';
export default {
    data() {
        return {
            isAuth: true,
        }
    },
    computed:{
        ...mapGetters(['getAllCarts'])
    }
};
</script>

<style></style>
