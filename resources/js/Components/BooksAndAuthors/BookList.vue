<script>
import axios from 'axios';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Link
  },
  props: {
    authorId: {
      type: Number,
      default: null
    }
  },
  data() {
    return {
      Books: []
    };
  },
  mounted() {
    this.fetchBooks();
  },
  methods: {
    async fetchBooks() {
      try {
        const url = this.authorId ? `/api/books?id=${this.authorId}` : '/api/books';
        const response = await axios.get(url);
        this.Books = await Promise.all(
          response.data.map(async (book) => {
            const authorsResponse = await axios.get(`/api/author/${book.author_id}`);
            return {
              ...book,
              authors: authorsResponse.data
            };
          })
        );
      } catch (error) {
        console.error('Error fetching Books:', error);
      }
    }
  }
};
</script>
  
  

<template>
  <div class="book-list">
    <h1 class="title">Books</h1>
    <ul class="book-items">
      <li v-for="Book in Books" :key="Book.id" class="book-item">
        <h2 class="book-name">{{ Book.name }}</h2>
        <p class="book-author">
          Author:
          <Link :href="`/author/${Book.author_id}`">{{ Book.authors.name }}</Link>
        </p>
        <p class="book-date">Published: {{ Book.date_of_publishing }}</p>
      </li>
    </ul>
  </div>
</template>

<style scoped>
.book-list {
  padding: 20px;
  background-color: #000000;
}

.title {
  font-size: 24px;
  color: #ffffff;
}

.book-items {
  list-style-type: none;
  padding: 0;
}

.book-item {
  margin-bottom: 15px;
  padding: 10px;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.book-name {
  color: #ffffff;
  font-size: 20px;
  margin: 0;
}

.book-author,
.book-date {
  font-size: 16px;
  color: #666;
  margin: 5px 0;
}
</style>

