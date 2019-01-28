<template>
  <div class="passers-list">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <input type="text"
            v-model="keyword"
            class="form-control"
            placeholder="Search">
        </div>
      </div>
      <div class="col-6 text-right">
        <AddEntryModal @refresh="fetch"/>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Name</th>
                <th>Campus Eligibility</th>
                <th>School</th>
                <th>Division</th>
              </tr>

            </thead>
            <tbody>
              <Entry v-for="passer in data"
              :passer="passer"
              :key="passer.id"></Entry>
            </tbody>
          </table>

          <Pagination size="md"
            :total-rows="paginationData.totalRows"
            :limit="10"
            align="center"
            @change="pageChange"
            v-model="paginationData.currentPage"
            :per-page="50" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
import Entry from './Entry';
import AddEntryModal from './AddEntryModal';
import Pagination from 'bootstrap-vue/es/components/pagination/pagination';
import {debounce, merge} from 'lodash';

export default {

  /**
  * Data
  *
  * @return {Object}
  * @author {goper}
  */
  data()
  {
    return {
      data: [],
      keyword: '',
      paginationData: {
        currentPage: 1,
        totalRows: 0,
      }
    }
  },

  components: {
    Entry,
    Pagination,
    AddEntryModal,
  },

  computed: {

  },

  watch: {
    keyword(newKeyword)
    {
      this.search(newKeyword);
    }
  },

  methods: {

    fetch(page = 1, keyword = '')
    {
      let query = {page};

      if (keyword != '') {
        query = merge({keyword}, query);
      }

      http.getJSON('api/passers', query)
      .then(({data}) => {
        let {passers} = data;

        this.data = passers.data;
        this.paginationData.currentPage = passers.current_page;
        this.paginationData.totalRows = passers.total;
      })
      .catch(error => console.log('error', error));
    },

    /**
     * Pagination changes
     * @param  {integer} page
     * @return {void}
     */
    pageChange(page)
    {
      if (this.keyword != '') {
        this.fetch(page, keyword);
      }

      this.fetch(page);
    },

    search: debounce(function(keyword) {
      this.fetch(1, keyword);
    }, 500),
  },

  created()
  {
    // Fetch all passers
    this.fetch();
  }
}
</script>
