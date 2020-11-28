<?php

namespace FiratOzpinar\Paywant;

class Gateway
{
    /**
     * Mobile Payment (Turkcell,Turk Telekom and Vodafone)
     */
    const MOBILE_PAYMENT = 1;

    /**
     * Credit,Debit,Prepaid Cards (Mastercard,Visa and Troy)
     */
    const CARD = 2;

    /**
     * Local Payments ( Banks,ATM,EFT)
     */
    const LOCAL = 3;

    /**
     * Turk Telekom Netten Ödeme (TTNET)
     */
    const TTNET = 4;

    /**
     * Mikrocard
     */
    const MIKROCARD = 5;

    /**
     * Cashu
     */
    const CASHU = 6;

    /**
     * Papara
     */
    const PAPARA = 7;
}