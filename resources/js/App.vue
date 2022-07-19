<template>
  <div>
    <div id="Header">
      <div class="Header">
        <img src="assets/img/logo.png" alt="Logo" />
      </div>
    </div>

    <div id="Body">
      <!-- Body image -->
      <img
        src="assets/img/body_bg.png"
        style="
          width: 100%;
          height: 500px;
          position: absolute;
          z-index: -1;
          min-width: 1300px !important;
        "
      />
      <!-- Body Kategori -->
      <div class="BKapla">
        <div class="BKat">
          <!-- Sol Menü -->
          <ul class="BSol">
            <li v-for="data in kategori" :key="data.key">
              <a href="#" style="font-weight: bold">{{data.nama_kategori}}</a>
            </li>
          </ul>
          <!-- Sağ Menü -->
          <ul class="BSag">
            <a href="/kategori" class="btn btn-primary">Tambah Kategori</a>
          </ul>
        </div>

        <div class="clear"></div>
      </div>
    </div>

    <loading
      :active.sync="loadPage"
      :is-full-page="true"
      :loader="'bars'"
      :color="'#1f1498'"
    ></loading>

    <div :class="{ 'c-wrapper': true }">
      <transition name="fade" mode="out-in">
        <router-view />
      </transition>
    </div>

    <!-- Footer -->
    <div id="Footer">
      <div class="FooterUst">
        <div class="Footer">
          <div class="FLogo"><img src="assets/img/logo.png" alt="" /></div>
          <div class="FSosyalMedya">
            <div class="SB">FOLLOW US ON SOCIAL MEDIA</div>
            <div class="SA">
              DON'T DISCONNECT WITH US THANKS TO OUR SOCIAL MEDIA ACCOUNTS
            </div>
            <div class="Hesaplar">
              <div class="Sh Facebook"></div>
              <div class="Sh Instagram"></div>
              <div class="Sh Youtube"></div>
              <div class="Sh In"></div>
            </div>
          </div>
          <div class="FAbone">
            <div class="SB">E - BULLETIN SUBSCRIPTION</div>
            <div class="SA">
              SUBSCRIBE TO THE NEWSLETTER AND BE INFORMED INSTANTLY ON THE LAST
              ADDED MOVIES
            </div>
            <form action="">
              <div class="Fm1"><div class="Fm2"></div></div>
              <input
                type="text"
                name="haber"
                placeholder="E-MAİL ADRESİNİZİ YAZINIZ.."
              />
              <button></button>
            </form>
          </div>
        </div>
      </div>
      <div class="FooterAlt">
        COPYRIGHT 2015 | TÜM HAKLARI SAKLIDIR - <a href="#">SİTEMAP</a> -
        <a href="#">BİZE ULAŞIN</a>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapGetters, mapActions } from "vuex";
import "vue-loading-overlay/dist/vue-loading.css";
import Loading from "vue-loading-overlay";

export default {
  components: {
    Loading,
  },
  computed: {
    ...mapState(["loadPage"]),
    ...mapState("kategori", ["kategori"]),
  },
  methods: {
    ...mapActions("kategori", ["getKategori"]),
  },
  created() {
    this.getKategori();
  },
};
</script>

<style lang="scss">
.swal2-popup {
  font-size: 0.7rem !important;
}
</style>
