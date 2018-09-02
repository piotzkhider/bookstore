<?php
/**
 * This file is part of the PhpMentors.BookStore
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace PhpMentors\BookStore;

use PHPUnit\Framework\TestCase;

class BookStoreTest extends TestCase
{
    /**
     * @var BookStore
     */
    protected $bookStore;

    protected function setUp()
    {
        $this->bookStore = new BookStore;
    }

    public function testIsInstanceOfBookStore()
    {
        $actual = $this->bookStore;
        $this->assertInstanceOf(BookStore::class, $actual);
    }
}
