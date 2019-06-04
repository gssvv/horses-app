import Cookies from 'js-cookie'
import jwt from 'jsonwebtoken'
import productsList from '@/assets/productsList'

let cartList = {}

for (let i of productsList) {
  cartList[i.id] = { amount: 0 }
}

export const state = () => ({
  cart: cartList
})

export const getters = {
  getCartAmount(state) {
    let keys = Object.keys(state.cart)

    let result = 0

    for (let i of keys) {
      result += state.cart[i].amount
    }

    return result
  }
}

export const mutations = {
  SET_PRUDUCT(state, data) {
    if (!state.cart[data.id]) state.cart[data.id] = { amount: 0 }

    state.cart[data.id].amount = data.amount
  },
  ADD_PRUDUCT(state, data) {
    if (!state.cart[data.id]) state.cart[data.id] = { amount: 0 }

    state.cart[data.id].amount += data.amount
  },
  SET_CART(state, newCart) {
    state.cart = newCart
  }
}

export const actions = {
  addProduct({ commit, dispatch }, data) {
    commit('ADD_PRUDUCT', { id: data.id, amount: data.amount })

    dispatch('updateCookies')
  },

  getCartCookies({ commit }) {
    let decoded = jwt.decode(Cookies.get('cart'))

    if (!decoded) return

    delete decoded.iat
    commit('SET_CART', decoded)
  },

  cleanCart({ state, commit, dispatch }) {
    for (let id in Object.keys(state.cart)) {
      commit('SET_PRUDUCT', { id, amount: 0 })
    }
    dispatch('updateCookies')
  },

  updateCookies({ state }) {
    let token = jwt.sign(state.cart, 'key')
    Cookies.set('cart', token)
  },

  updateProduct({ commit, dispatch }, data) {
    commit('SET_PRUDUCT', data)
    dispatch('updateCookies')
  },

  removeFromCart({ commit, dispatch }, id) {
    commit('SET_PRUDUCT', { id: id, amount: 0 })
    dispatch('updateCookies')
  }
}
